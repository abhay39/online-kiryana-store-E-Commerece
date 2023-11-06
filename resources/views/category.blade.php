<x-layout>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-3xl font-bold">Related Product to {{$productName}} </h1>
    <div class="bg-gray-100 w-full p-3 flex items-center justify-between mt-8 flex-wrap">
        @foreach($totalProducts as $item)
            
                <div class="flex flex-col items-center justify-center bg-white p-3 rounded-lg mb-3 w-[300px]">
                  <img src="{{ $item->productImage }}" alt="biscuit" class="h-40 w-40 hover:scale-105 cursor-pointer">
                  <p class="font-bold mt-2">&#8377;.{{ $item->price }}/-</p>
                  <h1 class="text-base">{{ $item->productName }}</h1>
                  <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="productID" value={{$item->productID}}>
    
                    <input type="hidden" name="productTitle" value={{$item->productName}}>
    
                    <input type="hidden" name="productPrice" value={{$item->price}}>
                    <input type="hidden" name="productImage" value={{$item->productImage}}>
    
                    <input  name="pQty" class="p-2 rounded-sm mb-2 w-[100%] flex flex-col" placeholder="Enter the qty">
    
                  <button type="submit"  class="bg-blue-300 p-2 rounded-md text-white cursor-pointer border-none outline-none w-[100%]">Add to cart</button>
                </div>
            </form>
        @endforeach
    </div>
</body>
</html>
</x-layout>