<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Strings;
use Razorpay\Api\Api;


class PaymentController extends Controller
{   
    
    public function paymentDone(Request $request) {
        dd(session('userData'));
        // echo $request;
        // $userData=[
        //     'fullName' => $request->fullname,
        //     'address' => $request->address,
        //     'apartment' => $request->apartment,
        //     'number' => $request->number,
        //     'landmark' => $request->landmark,
        //     'razorpay_payment_id'=>$request->razorpay_payment_id
        // ];
        // return redirect('/api/payment')->with('userData', $userData);
    }

    public function payment(Request $request) {
        $userData = $request->session()->get('userData');
        // dd($userData);
        $user = auth()->user();
        dd($user);
        
    }

    public function SuccessOrder(Request $request){
        if(auth()->check()){
            $user = auth()->user();
            $userEmail=$user->email;
            $userFullName=$user->fullname;
            $cartItems=Cart::where('userEmail',$userEmail)->get();
            
            
            foreach($cartItems as $cart){
                $order=new Orders();
                $order->productID=$cart->productID ;
                $order->productName=$cart->productName;
                $order->price=$cart->price;
                $order->qty=$cart->qty;
                $order->totalPrice=$cart->totalPrice;
                $order->userFullName = $userFullName;
                $order->userEmail = $userEmail;
                $order->orderStatus = "not delivered";
                $order->address = $request->address;
                $order->apartment = $request->apartment;
                $order->number = $request->number;
                $order->landmark = $request->landmark;
                $order->paymentMethod = $request->paymentMethod;
                $order->save();
            }
            $totalPrice=$request->totalPrice;
            DB::table('cart')->where('userEmail', $userEmail)->delete();
            return view('successOrder',compact('totalPrice'));
        }else{
            return redirect("/login")->with('error',"product not added to cart");
        }
    }

    public function handlePayment(Request $request)
    {   
        // echo $request;
        $userDetails=[
            'fullName' => $request->fullName,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'number' => $request->number,
            'landmark' => $request->landmark,
        ];
        $totalPrice=$request->totalPrice;
        return view('payment',compact('totalPrice'),[
            'userDetails' => $userDetails
        ]);
    }
}
