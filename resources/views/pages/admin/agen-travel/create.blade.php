@extends('layouts.admin.dashboard')

@section('title')
    Admin Tambah Travel
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
                            Form Tambah Data Travel
                        </h1>
                        <div class="bg-white shadow-md rounded my-6 py-5 px-5 flex justify-center">
                            <form action="{{ route('admin.data.agen.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-1/2 md:w-5/8 .min-w-full md:w-5/8 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                      Nama Agen
                                    </label>
                                    <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="name" type="text" placeholder="Masukkan Nama Agen">
                                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                                  </div>
                                  <div class="w-1/2 md:w-3/8 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="travel">
                                      Travel
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="id_travel" id="travel">
                                          @foreach ($travels as $travel)
                                            <option value="{{ $travel->id }}">{{ $travel->nama_travel }}</option>
                                          @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                        </div>
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-1/2 md:w-5/8 .min-w-full md:w-5/8 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                      Email
                                    </label>
                                    <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="email" id="email" type="email" placeholder="Masukkan Email Agen">
                                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                                  </div>
                                  <div class="w-1/2 md:w-5/8 .min-w-full md:w-5/8 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                                      Password
                                    </label>
                                    <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="password" id="password" type="password" placeholder="Password">
                                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6 mt-10">
                                    <div class="w-full px-3 flex justify-end">
                                        <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                                            Daftarkan Admin
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
