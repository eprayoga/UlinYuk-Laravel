<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    


    <!-- Fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="{{ asset('styles/global-style.css') }}" />
    <link rel="stylesheet" href={{ asset("styles/navbar.css")}} />
    <link rel="stylesheet" href={{ asset("styles/sidebar.css")}} />
    <link rel="stylesheet" href={{ asset("styles/dashboard.css")}} />
  </head>
  <body>
    <nav id="nav">
        <div class="nav-container">
          <a href="/" class="nav-brand">
            <img src="{{ asset('assets/icon/logo.svg') }}" />
            <span>UlinYuk</span>
          </a>
          <div class="nav-search">
            <div class="search-input">
              <input type="text" placeholder="Yuk cari tempat favoritmu ...." />
              <div class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
            </div>
          </div>
          @guest
            <div class="nav-button">
              <a href="/register">
                <div class="button outline border outline-none">Sign Up</div>
              </a>
              <a href="/login">
                <div class="button primary">Login</div>
              </a>
            </div>
          @endguest
          @auth
              <div x-data="{ open: false }" class="hidden bg-transparent w-64 lg:flex justify-center items-center">
                  <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{'transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                    <div class="flex justify-center items-center space-x-3 cursor-pointer">
                      <div class="font-normal dark:text-gray-700">
                        <div class="cursor-pointer">{{ Auth::user()->name }}</div>
                      </div>
                      <div class="w-12 h-12 rounded-lg overflow-hidden border-2 dark:border-white border-gray-900">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                      </div>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-white rounded-lg shadow border dark:border-transparent mt-5">
                      <ul class="space-y-3 text-gray-700">
                        <li class="font-normal">
                          <a href="/dashboard" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2  " d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            Dashboard
                          </a>
                        </li>
                        <li class="font-normal">
                          <a href="/user/profile" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            Pengaturan Akun
                          </a>
                        </li>
                        <hr class="dark:border-gray-700">
                        <li class="font-normal">
                          <form class="w-full" method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" class="flex w-full items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                              <div class="mr-3 text-red-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                              </div>
                              {{ __('Log Out') }}
                            </button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
              </div>
          @endauth
        </div>
      </nav>
  
      <div class="nav-mobile">
        <a href="/" class="active">
          <div class="nav-mobile-button">
            <i class="fa-solid fa-magnifying-glass"></i><span>Explore</span>
          </div>
        </a>
        <a href="/">
          <div class="nav-mobile-button">
            <i class="fa-regular fa-heart"></i><span>Suka</span>
          </div>
        </a>
        <a href="/">
          <div class="nav-mobile-button">
            <i class="fa-regular fa-user"></i><span>Login</span>
          </div>
        </a>
      </div>
    <div class="dashboard-container">
      <aside>
        <a href="/"></a>
        <div class="sidebar-container">
          <div class="sidebar-profile">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="profile"/>
            <div class="name">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
          </div>
          <div class="sidebar-menu">
            <ul class="main-menu">
              <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="/dashboard">
                  <div class="menu-item">
                    <i class="fa-solid fa-grip"></i> <span>Dashboard</span>
                  </div>
                </a>
              </li>
              <li class="{{ (request()->is('dashboard/my-ticket')) ? 'active' : '' }}">
                <a href="{{ route('my-ticket') }}">
                  <div class="menu-item">
                    <i class="fa-solid fa-ticket"></i> <span>Tiket Saya</span>
                  </div>
                </a>
              </li>
              <li class="{{ (request()->is('dashboard/transaction')) ? 'active' : '' }}">
                <a href="{{ route('user.transaction') }}">
                  <div class="menu-item">
                    <i class="fa-solid fa-cart-shopping"></i
                    ><span>Transaksi</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="menu-item">
                    <i class="fa-solid fa-heart"></i> <span>Disukai</span>
                  </div>
                </a>
              </li>
              <span class="menu-category">Pengaturan</span>
              <li>
                <a href="/user/profile">
                  <div class="menu-item">
                    <i class="fa-solid fa-user"></i> <span>Profil</span>
                  </div>
                </a>
              </li>
              <li>
                <a class="cursor-pointer">
                <form class="w-full" action="{{ route('logout') }}" method="POST">
                  @csrf
                    <button type="submit" class="menu-item logout w-full">
                    <i class="fa-solid fa-power-off"></i> <span>Log Out</span>
                    </button>
                </form>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>
      <main>
        @yield('content')
      </main>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
  </body>
</html>
