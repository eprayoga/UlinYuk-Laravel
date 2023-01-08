@section('title')
    Verifikasi Tiket Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Verifikasi Tiket Tiket
    </h2>
</x-slot>


<div class="container px-6 mx-auto grid">

    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Verifikasi Tiket Tiket
    </h2>
  
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
        <form class="px-7 py-10 flex gap-5 justify-center" action="{{ route('agen.verifikasi.tiket.update') }}" method="POST">
            @csrf
            <div class="w-2/6 relative">
                <span class="absolute rounded bg-blue-600 text-white font-semibold left-0 top-0 h-full px-4 py-2">ULINYUK-</span>
                <input name="kode" type="text" class="form-control block w-full px-3 pl-28 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Masukkan Kode Tiket">
            </div>
            <button type="submit" class=" w-1/6 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Verifikasi Tiket</button>
        </form>
    </div>
  
</div>