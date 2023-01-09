{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UlinYuk - Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </head>

  <body>
    @include('sweetalert::alert')

    <section class="h-screen relative">
      <div class="px-4 h-full text-gray-800 py-4 pr-4 lg:pr-20">
        <div
          class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
        >
          <div
            class="grow-0 shrink-1 md:shrink-0 basis-auto h-full xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 hidden md:mb-0 lg:block"
          >
            <img
              src="/assets/images/login-jumbotron.jpg"
              class="w-full h-full object-cover rounded-2xl"
              alt="Sample image"
            />
          </div>
          <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">

            <img src="/assets/icon/logo.svg" alt="" class="w-16 mb-4" />
            <h1 class="text-4xl font-bold mb-6">Login</h1>
            <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
              @csrf
              <div
              class="flex flex-row items-center justify-center lg:justify-start"
              >
              <p class="text-sm text-left w-full mb-0 mr-4 text-gray-700">
                Log in untuk menjelajahi semuanya bersama kami
              </p>
            </div>
            @if ($errors->any())
                <ul class="list-none absolute top-4 right-4">
                    @foreach ($errors->all() as $error)
                      <li class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 right-0" role="alert">
                        {{ $error }}
                      </li>
                    @endforeach
                </ul>
            @endif

              <div
                class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
              ></div>

              <!-- Email input -->
              <div class="mb-6">
                <input
                  type="email"
                  name="email"
                  class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  required autofocus
                  placeholder="Email address"
                />
              </div>

              <!-- Password input -->
              <div class="mb-6">
                <input
                  autocomplete="current-password"
                  name="password"
                  type="password"
                  class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  placeholder="Password"
                  required
                />
              </div>

              <div class="flex justify-between items-center mb-6">
                <div class="form-group form-check">
                  <input
                    name="remember"
                    type="checkbox"
                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                    id="exampleCheck2"
                  />
                  <label
                    class="form-check-label inline-block text-gray-800"
                    for="exampleCheck2"
                    >Remember me</label
                  >
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-gray-800">Forgot password?</a>
                @endif
              </div>

              <div class="text-center lg:text-left">
                <button
                  type="submit"
                  class="inline-block px-7 py-3 w-full bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                >
                  Login
                </button>
                <p
                  class="text-sm font-semibold mt-2 pt-1 mb-0 w-full text-left"
                >
                  Don't have an account?
                  <a
                    href="/register"
                    class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                    >Register</a
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </body>
</html>

