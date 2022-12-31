@extends('layouts.admin.dashboard')

@section('title')
    Agen Tambah Tiket
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-hidden py-5">
                    <div class="w-full lg:w-5/6">

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

                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                            Form Tambah Tiket Travel
                        </h1>
                        <div class="bg-white shadow-md rounded my-6 py-5 px-5 flex justify-center">
                            <form action="{{ route('agen.tiket.travel.create') }}" method="POST" class="w-full" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full .min-w-full md:w-3/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_tiket">
                                      Nama Tiket
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="nama_tiket" id="nama_tiket" type="text" placeholder="Masukkan Nama Wisata">
                                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                                  </div>
                                  <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="harga">
                                      Harga
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="harga" id="harga" type="number" placeholder="Masukkan Nama Wisata">
                                    <p class="text-gray-600 text-xs italic">Masukkan dalam format (Rp)</p>
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="deskripsi">
                                      Deskripsi Tiket
                                    </label>
                                    <textarea rows="4" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="deskripsi" name="deskripsi"></textarea>
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
                </div>
            </div>
        </div>
    </div>
    
@endsection