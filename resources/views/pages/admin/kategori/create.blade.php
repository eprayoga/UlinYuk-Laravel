@extends('layouts.admin.dashboard')

@section('title')
    Admin Tambah Kategori
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-hidden py-5">
                    <div class="w-full lg:w-5/6">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                            Form Tambah Data Kategori
                        </h1>
                        <div class="bg-white shadow-md rounded my-6 py-5 px-5 flex justify-center">
                            <form action="{{ route('admin.data.kategori.store') }}" method="POST" class="w-full" enctype="multipart/form-data" id="locations">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="kategori">
                                        Nama Kategori
                                      </label>
                                      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="kategori" name="nama_kategori" type="text" />
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