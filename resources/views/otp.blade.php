<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Sign Up</title>
</head>

<body>
  <div class="h-[100vh] flex flex-col  md:flex-row ">
    <div class="bg-black w-full p-3 text-white text-center text-3xl font-bold h-40 md:h-[100vh] items-center justify-center flex select-none">
      <h1 class="hover:transition ease-in-out cursor-pointer">S.S. Karyana Store</h1>
    </div>


    <div class="flex justify-center w-full items-center  p-6 space-x-5 space-y-5">
      @if(session('error'))
          <div class="bg-slate-200 p-2 rounded-lg mt-2">
              <p class="text-red-600 text-center">{{ session('message') }}</p>
          </div>
      @endif
      

      <form action="/verifyOTP" method="POST" class="bg-slate-300 p-5 rounded">
        @csrf
        <h1 class="text-4xl font-bold text-black text-center">
          OTP Verification
        </h1>

       <div class="mt-2">
        <label class="text-base text-black">
          Email
        </label>
        <br />
        <input value="{{old('email')}}" name="email" placeholder="Enter your email ID" class="p-2 rounded border-green-300 outline-none w-full md:w-[250px]"/>
          @error('email')
            <p class="shadow-sm text-red-600">{{$message}}</p>
          @enderror
        </div>

       <div class="mt-2">
        <label class="text-base text-black">
          OTP
        </label>
        <br />
        <input value="{{old('otp')}}" name="otp" placeholder="Enter your otp" class="p-2 rounded border-green-300 outline-none w-full md:w-[250px]"/>
          @error('otp')
            <p class="shadow-sm text-red-600">{{$message}}</p>
          @enderror
        </div>

        @if(session('error'))
          <div class="bg-slate-200 p-2 rounded-lg mt-2">
              <p class="text-red-600 text-center">{{ session('error') }}</p>
          </div>
      @endif
       
       <div>
        <input type="submit" value="Verify OTP" class="p-2 bg-cyan-700 items-center justify-center text-center mt-2 w-full md:w-[250px] rounded text-white text-lg cursor-pointer" />
       </div>
       <div class="flex items-center justify-center mt-2">
         <p class="text-sm text-center">Don't have an account?  
        <a href="/signUp" class="text-sm text-center cursor-pointer underline text-black user-select:none"> Register</a>
       </div> 
      </form>
    </div>
  </div>
</body>
</html>