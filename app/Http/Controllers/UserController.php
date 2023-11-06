<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary as FacadesCloudinary;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Order;

class UserController extends Controller
{
    public function homePage(){
        if(Auth::check()){
            return view('landing');
        }else{
            return view('login');
        }
    }

    public function landing(){
        $totalProducts = DB::table('product')->get();
        if(auth()->check()){
            $user = auth()->user();
            $userEmail=$user->email;
            $count=Cart::where('userEmail',$userEmail)->count();
            return view("landing",['totalProducts'=>$totalProducts])->with('cartItems',$count);
        }else{
            return view("landing",[
                'totalProducts'=>$totalProducts
            ]);
        }
    }

    public function login(){
        return view('login');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function profile(){
        return view('profile');
    }

    public function dashboard(){
        $totalOrders = DB::table('orders')->get();
        $totalProducts = DB::table('product')->get();
        $totalUsers = DB::table('users')->get();
        $totalCart = DB::table('cart')->get();
        $totalAmount=0;
        foreach($totalOrders as $item){
            $totalAmount += $item->totalPrice;
        }
        return view('dashboard',compact('totalAmount'),[
            'totalProducts'=>$totalProducts,
            'totalUsers'=>$totalUsers,
            'totalCart'=>$totalCart,
            'totalOrders'=>$totalOrders
        ]);
    }

    public function updateCart(Request $request){
        echo $request;
        $email=$request->email;
        $orderStatus=$request->orderStatus;
        DB::table('cart')->where('userEmail',$email)->update(['orderStatus'=>$orderStatus]);
        DB::table('orders')->where('userEmail',$email)->update(['orderStatus'=>$orderStatus]);
        return redirect()->back()->with('success','Order updated successfully');
    }

    public function updateOrder(Request $request){
        echo $request;
        $email=$request->email;
        $orderStatus=$request->orderStatus;
        DB::table('orders')->where('userEmail',$email)->update(['orderStatus'=>$orderStatus]);
        return redirect()->back()->with('success','Order updated successfully');
    }

    public function deleteUser(Request $request){
        echo $request;
        $email=$request->email;
        DB::table('users')->where('email',$email)->delete();
        return redirect()->back()->with('success','User deleted successfully');
    }

    public function addProduct(Request $request){
        $totalQtY=$request->total_quantity;
        $res=$request->file('image')->store('public/profile');
        $answ=str_replace('public','storage',$res);

        $newPro=new Product();
        $newPro->productID=uniqid();
        $newPro->productName=$request->product_name;
        $newPro->productCategory=$request->productCategory;
        $newPro->price=$request->price;
        $newPro->qty=$totalQtY;
        $newPro->productImage=$answ;
        $newPro->save();

        return redirect()->back()->with('success','product added successfully');
    }

    public function uploadImage(Request $request)
    {   
        $fullname=$request->fullname;
        $email=$request->email;
        $res=$request->file('profile')->store('public/profile');
        $answ=str_replace('public','storage',$res);
        
        $checkUser=User::where('email',$email)->first();
        if($checkUser){
            $checkUser->fullname=$fullname;
            $checkUser->email=$email;
            $checkUser->profile=$answ;
            $checkUser->save();
            return redirect()->back()->with('success','Profile Updated');
        }
    }

    public function getTotalRevenus(){
        $totalOrders = DB::table('orders')->get();
        dd($totalOrders);
    }
    
    public function checkLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
    
    public function register(){
        return view('register');
    }

    public function registration(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $res=$request->file('profile')->store('public/profile');
        $answ=str_replace('public','storage',$res);

        $otp=rand(10,999999);
        $user=new User();
        $user->fullname=$request->name;
        $user->email=$request->email;
        $user->otp=$otp;
        $user->profile=$answ;
        $user->password=bcrypt($request->password);
        $userName=$request->name;

        $to_email = $request->email;
        $subject = "To verify the OTP to create an account in S.S. Karyana Store";

        $body = "

        Dear $userName,
        
        I hope this email finds you well. Thank you for choosing S.S. Karyana Store for your shopping needs. We are excited to have you as a potential member of our online community.
        
        To ensure the security and validity of your account creation, we need to verify the OTP (One-Time Password) you received during the registration process. Please take a moment to enter the OTP in the provided space on our website or app.
        
        Your OTP is: $otp
        
        Here's how to complete the verification process:
        
        1. Go to the S.S. Karyana Store website or mobile app.
        2. Click on the 'Create Account' or 'Sign Up' option.
        3. Enter your registration details.
        4. When prompted, input the OTP code provided above.
        5. Click 'Verify OTP' or a similar option to complete the process.
        
        This additional layer of security ensures that your account is protected and helps us keep your personal information safe.
        
        If you have any questions or encounter any issues during this process, please don't hesitate to contact our customer support team at abhaytechhub@gmail.com or +916284023056.
        
        Thank you for choosing S.S. Karyana Store. We look forward to serving you and providing you with a seamless shopping experience.
        
        Best regards,
        
        Abhay Kumar Gupta
        S.S. Karyana Store Team";

        $headers = "From: abhaytechhub@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            $isDone=$user->save();
            if($isDone){
                
                return view('otp')->with('message','Verify the otp now to get started.');
            }else{
                return ('Unable to create an account...');
            }
            
        } else {
            return redirect()->back()->with('error',"Email sending failed...");
        }
    }

    public function verifyOTP(Request $request) {
        $user = User::where('email', $request->email)->first();
        echo $user;
        if ($user) {
            if($request->otp==$user->otp){
                $user->otp=uniqid();
                $user->role="user";
                $user->isVerified="verified";
                $user->save();
                $request->session()->regenerate();
                return redirect("/");
            }else{
                return redirect()->back()->with('error', 'Invalid OTP');
            }
        } else {
            return back()->with('error', 'User not found.');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect("/");
    }

    public function cart(Request $request){
        
        $pQty=$request->pQty;
        $pId=$request->input('productID');
        $pDetails=Product::where('productID',$pId)->get()->first();
        
        if(auth()->check()){
            $user = auth()->user();
            $userEmail=$user->email;
            $cart=new Cart();

            $cart->userEmail=$userEmail;
            $cart->productID=$pId;
            $cart->productName=$pDetails['productName'];
            $cart->price=$pDetails['price'];
            $cart->qty=$pQty;
            $totalPrice=$pQty*$pDetails['price'];
            $cart->totalPrice=$totalPrice;
            $cart->pImage=$pDetails['productImage'];
            $cart->orderStatus="pending";
            $done=$cart->save();
            if($done){
                $count=Cart::where('userEmail',$userEmail)->count();
                return redirect("/")->with('count',$count)->with('message',"product successfully added to cart.");
            }else{
                return redirect("/")->with('error',"product not added to cart");
            }
        }else{
            return redirect("/login")->with('error',"product not added to cart");
        }
        
    }

    public function itemsoncart(){
        if(auth()->check()){
            $user = auth()->user();
            $userEmail=$user->email;
            $cartItems=Cart::where('userEmail',$userEmail)->get();
            return view("itemsoncart")->with('cartItems',$cartItems);
        }else{
            return redirect("/login")->with('error',"product not added to cart");
        }
    }

    public function removeItem(Request $request){
        if(auth()->check()){
            $user = auth()->user();
            $userEmail=$user->email;
            $pId=$request->input('productID');
            $cart=Cart::where('userEmail',$userEmail)->where('productID',$pId)->first();
            $done=$cart->delete();
            if($done){
                return redirect("/cartItems")->with('message',"product successfully removed from cart.");
            }else{
                return redirect("/")->with('error',"product not removed from cart");
            }
        }else{
            return redirect("/login")->with('error',"product not removed from cart");
        }
        
    }

    public function checkOut(Request $request){
        
        if(auth()->check()){
            $totalPrice= $request->totalPrice;
            
            return view("checkout",compact('totalPrice'));

        }else{
            return redirect("/login")->with('error',"product not added to cart");
        }
        
    }

    public function singleProduct(Request $request){
        // echo $request;
        $productName=$request->productName;
        $product=Product::where('productCategory',$productName)->get();
        // dd ($product);
        return view('category',[
            'totalProducts' => $product,
            'productName'=>$productName,
        ]);
    }
}
