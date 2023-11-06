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
      <form enctype="multipart/form-data" action="/createUser" method="POST" class="bg-slate-300 p-5 rounded">
        @csrf
        <h1 class="text-4xl font-bold text-black text-center">
          Register
        </h1>

       <div class="mt-2">
        <label class="text-base text-black">
          Name
        </label>
        <br />
        <input value="{{old('name')}}" name="name" placeholder="Enter your name" class="p-2 rounded border-green-300 outline-none w-full md:w-[250px]"/>
          @error('name')
            <p class="shadow-sm text-red-600">{{$message}}</p>
          @enderror
        </div>

       <div class="mt-2">
        <label class="text-base text-black">
          Email Id
        </label>
        <br />
        <input value="{{old('email')}}"   name="email" type="email" placeholder="Enter your email id" class="p-2 rounded border-green-300 outline-none w-full md:w-[250px]"/>
        @error('email')
            <p class="shadow-sm text-red-600">{{$message}}</p>
          @enderror
       </div>

       <div class="mt-2">
        <label class="text-base text-black">
          Password
        </label>
        <br />
        <input  name="password" type="password" placeholder="Enter your username" class="p-2 rounded border-green-300 outline-none w-full md:w-[250px]"/>
        @error('password')
            <p class="shadow-sm text-red-600">{{$message}}</p>
          @enderror
       </div>

       <div class="mt-2">
        <label class="text-base text-black">
          Choose Profile
        </label>
        <br />
        <input type="file" accept="image/*"  name="profile"/>
       </div>

       <div class="mt-2 w-full flex items-center justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 w-full">Register Account</button>
       </div>
       <div class="flex items-center justify-center mt-2">
         <p class="text-sm text-center">Already have an account?  
        <a href="/login" class="text-sm text-center cursor-pointer underline text-black user-select:none"> Login</a>
       </div> 
      </form>
    </div>
  </div>
</body>
</html>