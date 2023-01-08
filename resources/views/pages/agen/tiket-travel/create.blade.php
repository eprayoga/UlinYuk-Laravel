@extends('layouts.agen.dashboard')

@section('title')
    Agen Tambah Tiket
@endsection

@section('content')

<div class="container px-6 mx-auto grid">

  <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
  >
    Form Tambah Tiket
  </h2>

  <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
    <form action="{{ route('agen.tiket.travel.create') }}" method="POST" class="w-full" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full .min-w-full md:w-3/4 px-3 mb-6 md:mb-0">
          <label class="text-gray-700 dark:text-gray-400" for="nama_tiket">
            Nama Tiket
          </label>
          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="nama_tiket" id="nama_tiket" type="text" placeholder="Masukkan Nama Wisata">
          {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label class="text-gray-700 dark:text-gray-400" for="harga">
            Harga
          </label>
          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="harga" id="harga" type="number" placeholder="Masukkan Nama Wisata">
          <p class="text-gray-600 text-xs italic">Masukkan dalam format (Rp)</p>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="text-gray-700 dark:text-gray-400" for="deskripsi">
            Deskripsi Tiket
          </label>
          <textarea rows="4" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="deskripsi" name="deskripsi"></textarea>
          <p class="text-gray-600 text-xs italic">Masukkan Deskripsi Tiket</p>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6 mt-10">
          <div class="w-full px-3 flex justify-end">
              <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                  Simpan Data
              </button>
          </div>
      </div>
  </form>
  </div>

</div>

@endsection