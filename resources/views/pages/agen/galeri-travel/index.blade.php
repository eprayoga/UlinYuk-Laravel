@section('title')
    Galeri Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Galeri Travel
    </h2>
</x-slot>

@section('content')

<div class="container px-6 mx-auto grid">

    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Galeri Travel
    </h2>
  
    <div class="px-6 py-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
            <a href="{{ route('agen.galeri.travel.create') }}" class="my-10 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Tambah Galeri
              </a>
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

@endsection