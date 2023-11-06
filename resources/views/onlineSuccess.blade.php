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

        <h1 class="text-2xl font-bold mb-3">Order Status</h1>
        
        {{-- <pre>
            {{ var_dump($order) }}
        </pre> --}}

        
        
        <div class="flex flex-col items-center justify-center ">
            <dotlottie-player src="./ani.json" background="transparent" speed="1" class="w-2/3 h-[400px]" direction="1" mode="normal" loop autoplay></dotlottie-player>
           
            <h1 class="text-2xl font-bold mb-3">We have successfully received your order and will be delivering in next 30 minutes...</h1>
        </div>


        

    </body>
    </html>
</x-layout>