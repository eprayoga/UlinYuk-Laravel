@extends('layouts.agen.dashboard')

@section('title')
    Agen Tambah Foto Travel
@endsection

@section('content')


@if($errors->any())
@foreach ($errors->all() as $error)
  <div class="bg-transparent text-center py-4 lg:px-4">
    <div class="p-2 bg-red-300 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
      <span class="font-semibold mr-2 text-left flex-auto">{{ $error }}</span>
    </div>
  </div>
  @endforeach
@endif

<div class="container px-6 mx-auto grid">

  <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
  >
  Tambah Data Foto Travel
  </h2>

  <div class="px-6 py-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
    <form action="{{ route('agen.galeri.travel.store') }}" method="POST" class="w-full" enctype="multipart/form-data" id="locations">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="foto">
            Foto
          </label>
          <span class="sr-only">Choose File</span>
          <input name="foto" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
          <p class="text-gray-600 text-xs italic">Pilih file foto</p>
      </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6 mt-10">
          <div class="w-full px-3 flex justify-end">
              <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                  Simpan Foto
              </button>
          </div>
      </div>
  </form>
  </div>
</div>
    
@endsection