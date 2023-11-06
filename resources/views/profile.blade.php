<x-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
    @vite('resources/css/app.css')
</head>
<body>

    <section class="bg-gray-100 py-10 rounded-md">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold mb-6">My Profile</h1>
            @if(session('success'))
            <div class="bg-slate-200 p-2 rounded-lg mt-2">
                <p class="text-red-600 text-center">{{ session('error') }}</p>
            </div>
      @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php 
                    if(Auth::check()){
                        $user=auth()->user();
                        $username=$user->fullname;
                        $email=$user->email;
                        $role=$user->role;
                        $image=$user->profile;
                    }    
                ?>
                <div class="flex flex-col ">
                    <h2 class="text-xl font-semibold mb-4">User Details</h2>
                    <img src={{$image}} class="h-40 w-40 rounded-full object-cover mb-3">
                    <p class="text-gray-700"><strong>Name:</strong> {{$username}}</p>
                    <p class="text-gray-700"><strong>Email:</strong> {{$email}}</p>
                    <p class="text-gray-700"><strong>Role:</strong> {{$role}}</p>
                    <!-- Display other user details here -->
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-4">Update Profile</h2>
                    <form enctype="multipart/form-data" action="/uploadImage" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" id="name" name="fullname" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{$username}}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{$email}}">
                        </div>
                        <input type="file" accept="image/*"  name="profile"/>
                        
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>

</x-layout>