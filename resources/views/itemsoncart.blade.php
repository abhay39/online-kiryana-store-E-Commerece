<x-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cart Items</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-2xl font-bold mb-3">List of items in your cart</h1>
        @if (count($cartItems) > 0)
    <ul>
        <?php 
            $totalPrice=0;    
        ?>
        @foreach ($cartItems as $cartItem)
            <li class="flex items-center justify-between shadow-slate-400 shadow-lg mb-4 ">
                <div class="flex items-center p-2">
                    <img src="{{$cartItem->pImage}}" alt="productImage" class="cursor-pointer h-28 w-28 mr-2 ml-1">
                    <div class="cursor-pointer">
                        <strong>Item ID:</strong> {{ $cartItem->productID }}
                        <br>
                        <strong>Item Name:</strong> {{ $cartItem->productName }}
                        <br>
                        <strong>Item Qty.:</strong> {{ $cartItem->qty}}
                        <br>
                        <strong>Price:</strong> &#8377; {{ $cartItem->price }}/-
                        <br>
                        <strong>Total Price:</strong> &#8377; {{ $cartItem->totalPrice }}/-
                        <br>
                        <?php 
                            $totalPrice += $cartItem->totalPrice;
                        ?>
                    </div>

                </div>
                <form action="/removeItem" method="POST">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $cartItem->productID }}">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-lg text-white font-bold py-2 px-4 mr-3">Remove</button>
                </form>
                
            </li>
        @endforeach
        <div class="flex justify-between shadow-lg shadow-slate-400 p-4 rounded-md cursor-pointer select-none">
            
            <h2 class="font-bold text-xl text-red-600">Total Price: &#8377;. {{$totalPrice}}/-</h2>
            <form action="/checkOut" method="POST">
                @csrf
                <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Check Out</button>
               
            </form>
        </div>
    </ul>
@else
    <p>No items in the cart.</p>
@endif
    </body>
    </html>
</x-layout>

