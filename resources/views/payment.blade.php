<x-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    @vite('resources/css/app.css')
</head>
<body>
    
    <h2 class="text-3xl text-red-500 font-bold">Detials of Order</h2>
    <div class="mt-3 p-3 text-base bg-slate-200 w-1/3 rounded-lg">
        
        <h2>Amount : <strong>&#8377;.{{$totalPrice}}/-</strong></h2>
        <form action="{{ route('paymentDone') }}" method="POST">
            @csrf
            <?php 
                $finalAmount=$totalPrice*100;
            ?>
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_test_6ihCWac9BC0OoZ" 
                data-amount={{$finalAmount}}
                data-currency="INR"
                data-name="BoroBazar"
                data-image="https://borobazar.vercel.app/_next/static/media/logo.026129ac.svg"
                data-prefill.email="{{ Auth::user()->email }}"
                data-prefill.contact="{{ Auth::user()->phone }}"
                data-theme.color="#F37254">
            </script>
            <input type="hidden" value="{{$totalPrice}}" name="totalAmount">
            
            <input type="hidden" value="{{$userDetails['fullName']}}" name="fullname">
            <input type="hidden" value="{{$userDetails['address']}}" name="address">
            <input type="hidden" value="{{$userDetails['apartment']}}" name="apartment">
            <input type="hidden" value="{{$userDetails['number']}}" name="number">
            <input type="hidden" value="{{$userDetails['landmark']}}" name="landmark">
        </form>
        
    </div>

    
</body>
</html>
</x-layout>