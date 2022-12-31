@section('title')
    Galeri Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Galeri Travel
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-hidden py-5">
                <div class="w-full lg:w-5/6">
                    <a href="{{ route('agen.galeri.travel.create') }}" class="my-10 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Tambah Galeri
                      </a>
                    <div class="bg-white shadow-md rounded my-6">
                        <section class="overflow-hidden text-gray-700 ">
                            <div class="container px-5 py-2 mx-auto lg:p-12">
                              <div class="flex flex-wrap -m-1 md:-m-2">
                                    @forelse ($galeris as $galeri)
                                    <div class="flex flex-wrap w-1/3 relative">
                                      <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" src="{{ Storage::url($galeri->foto) }}">
                                      </div>
                                      <form action="{{ route('agen.galeri.travel.delete', $galeri->id) }}" method="post" class="absolute top-0 right-0">
                                        <button type="submit" class=" bg-red-500 text-white py-2 px-2 rounded-xl font-medium shadow">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            Hapus Foto
                                        </button>
                                      </form>
                                    </div>
                                    @empty
                                    <h1 class="text-gray-700 text-center">
                                        Belum ada galeri travel
                                    </h1>
                                    @endforelse
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
