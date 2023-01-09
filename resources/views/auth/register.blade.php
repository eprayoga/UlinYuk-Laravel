<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UlinYuk - Daftar</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </head>

  <body>
    <section class="relative py-32">
      <div class="px-4 h-full text-gray-800 pr-4">
        <div
          class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
        >
          <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">

            <img src="/assets/icon/logo.svg" alt="" class="w-16 mb-4" />
            <h1 class="text-4xl font-bold mb-3">Daftar</h1>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div
              class="flex flex-row items-center justify-center lg:justify-start"
              >
              <p class="text-sm text-left w-full mb-0 mr-4 text-gray-700">
                Daftar dan gabung bersama kami
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

              <!-- Name input -->
              <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                  Nama Lengkap
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text" placeholder="Nama Lengkap">
              </div>

              <!-- Email input -->
              <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                  Alamat Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="email" placeholder="Alamat Email">
              </div>

              <!-- Phone input -->
              <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone_number">
                  Nomor Handphone
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone_number" name="phone_number" type="number" placeholder="0812-3456-789">
              </div>

              <!-- Password input -->
              <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                  Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" name="password" type="password" placeholder="*************">
                <p class="text-gray-600 text-xs italic mb-3">Buatlah selama dan segila yang Anda inginkan | Min: 8 Karakter</p>
              </div>

              <!-- Password input -->
              <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
                  Konfirmasi Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password_confirmation" name="password_confirmation" type="password" placeholder="*************">
              </div>

              <div class="text-center lg:text-left">
                <button
                  type="submit"
                  class="inline-block px-7 py-3 w-full bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                >
                  Daftar
                </button>
                <p
                  class="text-sm font-semibold mt-2 pt-1 mb-0 w-full text-left"
                >
                  Already registered?
                  <a
                    href="/login"
                    class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                    >Login</a
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

