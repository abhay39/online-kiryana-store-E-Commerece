<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>S.S. Karyana Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    @vite('resources/css/main.css')
    <style>
      footer{
        user-select: none;
      }
      footer li{
        margin-top: 10px;
        margin-bottom: 10px;
        font-weight: 300;
      }
      footer p{
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 10px;
      }
    </style>
  </head>
  </head>

  <body>
    <header class="header-bar mb-3 p-3 flex items-center justify-between">
      <div>
        <img src="https://borobazar.vercel.app/_next/static/media/logo.026129ac.svg" alt="logo">
      </div>
      
      <nav id="navBar" class="hidden md:flex">
        <ul class="flex">
          <li class="ml-3 cursor-pointer hover:text-red-500 hover:underline transition 0.2s ease-in"><a href="/">Home</a></li>
          <li class="ml-3 cursor-pointer hover:text-red-500 hover:underline transition 0.9s ease-in"><a href="/about">About Us</a></li>
          <li class="ml-3 cursor-pointer hover:text-red-500 hover:underline transition 0.9s ease-in"><a href="/contact">Contact Us</a></li>
          
          <?php 
            if(Auth::check()){
              echo '<li class="ml-3 cursor-pointer hover:text-red-500 hover:underline transition 0.9s ease-in"><a href="/profile"> My Profile</a></li>';
            }
          ?>
          <?php 
            if(Auth::check()){
              $user=auth()->user();
              if($user->role=='admin'){
                echo '<li class="ml-3 cursor-pointer hover:text-red-500 hover:underline transition 0.9s ease-in"><a href="/dashboard">Dashboard</a></li>';
              }
            }
          ?>
        </ul>
      </nav>
      <div class="flex">
        <div class="md:hidden sm:flex" id='listBtn'>
          <button>
            <img src="./btn.png" class="h-8 w-8 p-2 bg-slate-200 rounded-md" alt="icon" />
          </button>
        </div>
        <ul class="flex">
          <a href="/cartItems">
            <li onclick="" class="flex items-center ml-4 cursor-pointer shadow-lg bg-slate-200 p-2 rounded-md">
            <img src="./shopping-bag.png" alt="bag" height="30" width="30">
            @yield('content')
          </li>
          </a>
        </ul>
        <ul>
            <li class="flex items-center ml-4 cursor-pointer shadow-lg bg-slate-200 p-2 rounded-md">
              <img src="./user.png" alt="" height="30" width="30">
                  <?php 
                    if(Auth::check()){
                      echo '<form method="GET" action="/logout">
                          <button>Sign out</button>
                        </form>';
                    }else{
                      echo '<form method="GET" action="/login">
                        <button>Sign in</button>
                        </form>';
                    }
                  ?>
            </li>
        </ul>
      </div>
    </header>
    <hr>
    
    
    <div class="p-3">
      {{$slot}}
    </div>

    <hr>

    <footer class="flex flex-row justify-between mt-3 mb-3 p-3 flex-wrap sm:flex sm:flex-col">
      <div class="w-[300px] ">
        <img src="https://borobazar.vercel.app/_next/static/media/logo.026129ac.svg" alt="logo">
        <p>We offer high-quality foods and the best delivery service, and the food market you can blindly trust</p>
        <div class="mt-2">
          <ul class="flex">
            <li><img src="./f.png" alt="facebook" class="h-8 w-8 cursor-pointer"></li>
            <li><img src="./git.png" alt="github" class="h-8 w-8 cursor-pointer ml-3"></li>
            <li><img src="./you.png" alt="github" class="h-8 w-8 cursor-pointer ml-3"></li>
            <li><img src="./twi.png" alt="github" class="h-8 w-8 cursor-pointer ml-3"></li>
          </ul>
        </div>
      </div>
  
      <div class="">
        <h3 class="font-bold">About Us</h3>
        <ul>
          <li class="cursor-pointer">About us</li>
          <li class="cursor-pointer">Contact us</li>
          <li class="cursor-pointer">About team</li>
          <li class="cursor-pointer">Customer Support</li>
        </ul>
      </div>
  
      <div>
        <h3 class="font-bold">Our information</h3>
        <ul>
          <li class="cursor-pointer">Privacy policy update</li>
          <li class="cursor-pointer">Terms & conditions</li>
          <li class="cursor-pointer">Contact us</li>
          <li class="cursor-pointer">Return Policy</li>
          <li class="cursor-pointer">Site Map</li>
        </ul>
      </div>
  
      <div>
        <h3 class="font-bold">Community</h3>
        <ul>
          <li class="cursor-pointer">Announcements</li>
          <li class="cursor-pointer">Answer Center</li>
          <li class="cursor-pointer">Discussion boards</li>
          <li class="cursor-pointer">Giving works</li>
        </ul>
      </div>
  
      <div class="md:w-1/5 sm:w-full">
        <h3 class="font-bold">Subscribe Now</h3>
        <p>Subscribe your email for newsletter and featured news based on your interest</p>
      </div>
    </footer>
  
     <script>
      const listBtn=document.getElementById('listBtn');
      const navBar=document.getElementById('navBar');

      listBtn.addEventListener('click',()=>{
        navBar.style.display="flex";
        listBtn.style.display="none"
      })
     </script>
    </body>

  </html>