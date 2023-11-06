<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get("/",[UserController::class,"landing"]);
Route::get("/about",[UserController::class,"about"]);
Route::get("/contact",[UserController::class,"contact"]);
Route::get("/profile",[UserController::class,"profile"]);
Route::get("/homePage",[UserController::class,"homePage"]);
Route::get("/dashboard",[UserController::class,"dashboard"]);
Route::get("/getTotalRevenus",[UserController::class,"getTotalRevenus"]);

// login checking 
Route::get("/login",[UserController::class,"login"]);
Route::post("/checkLogin",[UserController::class,"checkLogin"]);
Route::post("/uploadImage",[UserController::class,"uploadImage"]);


// registration checking
Route::get("/signUp",[UserController::class,"register"]);
Route::post("/createUser",[UserController::class,"registration"]);
Route::post("/verifyOTP",[UserController::class,"verifyOTP"]);

//adding the logout functionality
Route::get("/logout",[UserController::class,"logout"]);

// adding the thing in cart
Route::get("/cartItems",[UserController::class,"itemsoncart"]);
Route::post("/cart",[UserController::class,"cart"]);

Route::post("/removeItem",[UserController::class,"removeItem"]);

Route::post("/checkOut",[UserController::class,"checkOut"]);
Route::post("/addProduct",[UserController::class,"addProduct"]);
Route::post("/updateCart",[UserController::class,"updateCart"]);
Route::post("/updateOrder",[UserController::class,"updateOrder"]);
Route::post("/deleteUser",[UserController::class,"deleteUser"]);


Route::post("/makeOrder",[PaymentController::class,"makeOrder"]);

Route::post("/successOrder",[PaymentController::class,"SuccessOrder"]);

Route::post('/payment', [PaymentController::class,"handlePayment"])->name('razorPay');
Route::post('/paymentDone', [PaymentController::class,"paymentDone"])->name('paymentDone');
Route::get('/api/payment', [PaymentController::class,"payment"]);
Route::post('/singleProduct', [UserController::class,"singleProduct"]);




