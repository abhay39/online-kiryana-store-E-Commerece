<x-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Check Out</title>
        @vite('resources/css/app.css')
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    </head>
    
    <body>

        <h1 class="text-2xl font-bold mb-3">Check Out Page</h1>
        <div class="flex flex-col items-center justify-center">
            <dotlottie-player src="./ani.json" background="transparent" speed="1" class="w-2/3 h-[400px]" direction="1" mode="normal" loop autoplay></dotlottie-player>
            <div id='boxes '>
                
                <h2 class="text-xl font-semibold text-red-800 text-center">You need to pay is : &#8377;. {{$totalPrice}}/- while taking your delivery.</h2>
                <h2 class="text-xl font-semibold text-red-800 text-center">Thank you for your order!!!</h2>
            </div>
            <h1 class="text-base text-red-700 text-center mt-3 font-bold mb-3 w-1/3" id="finalBuild">
            </h1>

        </div>


        

    </body>
    </html>
</x-layout>