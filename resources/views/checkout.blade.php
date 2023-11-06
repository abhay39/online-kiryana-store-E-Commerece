<x-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Check Out</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div>

            <div>
                <h1 class="text-xl font-bold text-red-600">Choose to method to order the products:</h1>
                <div class="flex items-center">
                    <input type="radio" name="cod" id="CASH">
                    <label for="COD" class="mt-1 ml-2">Cash On Delivery</label>
                </div>
                {{-- <div class="flex items-center">
                    <input type="radio" name="pay" id="ONLINE">
                    <label for="PAY" class="mt-1 ml-2">Pay Now</label>
                </div> --}}
            </div>

            {{-- first form --}}
            <form class="formBox" action="/successOrder" method="POST">
                @csrf
                <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                <input type="hidden" name="paymentMethod" value="cod">
                <div>
                    <label for="Enter full name">Enter full name:</label>
                    <br>
                    <input class="p-3 border-red-300 bg-slate-200 rounded-lg outline-red-300 w-[80%]" type="text" id="Enter full name" placeholder="Enter full name" name="fullName">
                </div>
                <div class="mt-2">
                    <label for="Enter full Address">Enter full Address:</label>
                    <br>
                    <input class="p-3 w-[80%] border-red-300 bg-slate-200 rounded-lg outline-red-300" type="text" id="Enter full name" placeholder="Enter full address" name="address">
                </div>
                <div class="mt-2">
                    <label for="Enter full Address">Enter Apartment Name:</label>
                    <br>
                    <input class="p-3 w-[80%] border-red-300 bg-slate-200 rounded-lg outline-red-300" type="text" id="Enter full name" placeholder="Enter apartment name" name="apartment">
                </div>
                <div class="mt-2">
                    <label for="Enter full Address">Enter Contact Number:</label>
                    <br>
                    <input class="p-3 w-[80%] border-red-300 bg-slate-200 rounded-lg outline-red-300" type="number" id="Enter full name" placeholder="Enter mobile number" maxlength="10" pattern="d{10}"  name="number">
                </div>
                <div class="mt-2">
                    <label for="Enter full Address">Enter your landmark:</label>
                    <br>
                    <input class="p-3 w-[80%] border-red-300 bg-slate-200 rounded-lg outline-red-300" type="text" id="Enter full name" placeholder="Enter landmark" name="landmark">
                </div>
    
                <button type="submit" class="p-2 mt-3 bg-gray-200 rounded-md" id="payOnlineButton">Order Now</button>   
            </form>

            {{-- second form --}}
            
        </div>

    </body>
    </html>
</x-layout>