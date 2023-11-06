@section('content')
    @if(Auth::check()){
      <pre>Cart: {{ $cartItems }}</pre>
    }
    @else{
      <pre>Cart: 0</pre>
    }
    @endif
    <!-- Other content for your landing page -->
@endsection
<x-layout>
  <!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/app.css')
  </head>
  <body>

    <div style="background: url(./banner-4.webp);" class="flex items-center justify-center flex-col bg-cover h-[500px] w-full ">
      <h1 class="text-[40px] font-bold text-[#0B4635]">Healthy vegetable that you </h1>
      <h1 class="text-[40px] font-bold text-[#0B4635]">deserve to eat fresh </h1>
      <p class="font-semibold text-slate-600">We source and sell the very best beef, lamb and pork, sourced with</p>
      <p class="font-semibold text-slate-600">the greatest care from farmer</p>
      <div class="bg-white p-3 sm:w-full md:w-[40%] mt-3 rounded-md">
        <input type="text" placeholder="What are you looking..." class="md:w-[90%] sm:w-[70%] p-2 border-none outline-none">
        <button type="submit" class="border-none outline-none p-2"><i class="fa fa-search"></i></button>
      </div>
    </div>

    <div class="flex justify-between mt-3 flex-wrap sm:w-full">

      <div class="flex items-center bg-[#FFEED6] rounded-md p-3 sm:w-full md:w-[380px] h-[115px] mb-3">
        <img src="1.webp" alt="first" class=" h-24 cursor-pointer hover:scale-110">
        <div>
          <h3 class="font-bold text-[16px]">Spring cleaning for home appliance</h3>
          <p class="text-gray-600 mt-2">Get your clean on supplies.</p>
        </div>
      </div>

      <div class="flex items-center bg-[#D9ECD2] rounded-md p-3 sm:w-full md:w-[380px] h-[115px] mb-3">
        <img src="2.webp" alt="first" class=" h-24 cursor-pointer hover:scale-110">
        <div>
          <h3 class="font-bold text-[16px]">Your pet choice for fresh healthy food</h3>
          <p class="text-gray-600 mt-2">Get your clean on supplies.</p>
        </div>
      </div>

      <div class="flex items-center bg-[#DBE5EF] rounded-md p-3 sm:w-full md:w-[380px] h-[115px] mb-3">
        <img src="3.webp" alt="first" class=" h-24 cursor-pointer hover:scale-110">
        <div>
          <h3 class="font-bold text-[16px]">Washing item with discount product</h3>
          <p class="text-gray-600 mt-2">Get your clean on supplies.</p>
        </div>
      </div>
    </div>

    {{-- items available at shop --}}
    
      <?php 
        $items = [
          [
            'image' => 'ppp.jpg',
            'title' => 'Cold Drinks'
          ],
          [
            'image' => 'b.jpg',
            'title' => 'Biscuit'
          ],
          [
            'image' => 'cc.jpg',
            'title' => 'Chocolate'
        
          ],
          [
            'image' => 'f.jpg',
            'title' => 'Face wash'
          ],
          [
            'image' => 'm.jpg',
            'title' => 'Milk'
          ],
          [
            'image' => 'o.jpg',
            'title' => 'Oil'
          ],
          [
            'image' => 's.webp',
            'title' => 'Spray'
          ],
        ];
      ?>

<div class="flex justify-between mt-8 flex-wrap items-center">
  @foreach($items as $item)
    <div class="flex flex-col items-center mb-3">
      <div class="bg-slate-200 p-5 rounded-full">
        <img src={{$item['image']}} alt="$item['title']" class="h-20 w-20 cursor-pointer hover:scale-125" />
      </div>
      <form action="/singleProduct" method="POST">
        @csrf
        <input type="hidden" name="productName" value={{$item['title']}} />
        <button class="font-bold border-none outline-none text-xl mt-2 text-slate-600 cursor-pointer select-none"> 
          {{$item['title']}}
        </button>
      </form>
    </div>
  
  @endforeach
</div>


  {{-- displaying all the items available with us --}}

  <div class="flex flex-col items-center justify-center mt-8">
    <h1 class="text-2xl font-bold">
      Best seller grocery near you
    </h1>
    <p class="text-base font-mono text-center mt-2">
      We provide best quality & fresh grocery items near your location.
    </p>
  </div>


  
  

  
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



<h1 class="text-3xl text-red-700">{{ session('count') }}</h1>

  <div class="mt-5">
    <img src="./bbb.webp" alt="banner" class="object-fit h-full w-full">
  </div>

  <div class="flex p-3 bg-slate-200 mt-3 items-center justify-around"> 
      <div class="md:w-[30%] sm:h-full">
          <h3 class="text-3xl font-bold text-center">
            Make your online shop easier with our mobile app
          </h3>
          <p class="text-center">BoroBazar makes online grocery shopping fast and easy. Get groceries delivered and order the best of seasonal farm fresh food.</p>
          <div class="flex mt-3 items-center justify-center ">
            <img src="./app-store.webp" alt="apple" class="ml-3 rounded-full cursor-pointer"/>
            <img src="./play-store.webp" alt="apple" class="ml-3 rounded-full cursor-pointer" />
          </div>
      </div>
    <div class="w-1/2 hidden md:flex">
      <img src="app.webp" alt="">
    </div>
  </div>


  </body>
  </html>
</x-layout>