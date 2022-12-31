<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ulin Yuk - Travel App</title>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    @include('includes.home.style')
  </head>
  <body onscroll="onScroll()">
    <!-- Navbar -->
    <nav id="nav" class="home">
      <div class="nav-container">
        <a href="/" class="nav-brand">
          <img src="assets/icon/logo.svg" />
          <span>UlinYuk</span>
        </a>
        <div class="nav-search">
          <div class="search-input">
            <input type="text" class="font-light" placeholder="Yuk cari tempat favoritmu ...." />
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

    <!-- Nav Mobile -->
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
      @guest()
      <a href="/login">
        <div class="nav-mobile-button">
          <i class="fa-regular fa-user"></i><span>Login</span>
        </div>
      </a>
      @endguest
      @auth()
      <a href="/dashboard">
        <div class="nav-mobile-button">
          <i class="fa-regular fa-user"></i><span>Dashboard</span>
        </div>
      </a>
      @endauth
    </div>

    {{ $slot }}

    <footer>
      <div class="main-footer">
        <div class="get-footer">
          <div class="text">
            <h1 class="text-3xl font-medium leading-loose">Ready to get started?</h1>
            <h1 class="text-3xl font-medium leading-loose">Talk to us today</h1>
          </div>
          <a href="/">
            <div class="button-footer">Get started</div>
          </a>
        </div>

        <div class="footer-brand">
          <div class="brand">
            <div class="logo">
              <img src="assets/icon/logo.svg" alt="" /> <span>UlinYuk</span>
            </div>
            <h4>The heart of travel</h4>
          </div>
          <div class="media-list">
            <i class="fa-brands fa-square-instagram"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-linkedin-in"></i>
          </div>
        </div>
        <div class="footer-link">
          <h3>ABOUT ULINYUK</h3>
          <div class="link">
            <a href="/">Home</a>
            <a href="#">Get in touch</a>
            <a href="#">FAQs</a>
          </div>
        </div>
        <div class="footer-link">
          <h3>PRODUCT</h3>
          <div class="link">
            <a href="/">Home</a>
            <a href="#">Get in touch</a>
            <a href="#">FAQs</a>
          </div>
        </div>
      </div>
    </footer>

    @include('includes.home.script')

  </body>
  </html>