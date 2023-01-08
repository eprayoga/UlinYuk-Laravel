@section('title')
    Tiket Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Tiket Travel
    </h2>
</x-slot>


<div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Tables Data Tiket
    </h2>

    <a href="{{ route('agen.tiket.travel.post') }}" class="my-10 w-fit bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        Tambah Tiket
      </a>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Nama Tiket</th>
              <th class="px-4 py-3">Deskripsi Tiket</th>
              <th class="px-4 py-3">Harga Tiket (Rp)</th>
              <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
          @forelse ($tikets as $tiket)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{ $tiket->nama_tiket }}
              </td>
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                >
                {{ $tiket->deskripsi }}
                </span>
              </td>
              <td class="px-4 py-3 text-sm">
                Rp {{ $tiket->harga }}
              </td>
              <td class="px-4 py-3">
                <div class="flex item-center justify-center">
                <a href="{{ route('agen.tiket.travel.edit', $tiket->id) }}">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                </a>
                <form action="{{ route('agen.tiket.travel.delete', $tiket->id) }}" method="post">
                    <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
              </td>
            </tr>
            @empty
                <h1 class="text-gray-700 text-center">
                    Belum ada data Tiket
                </h1>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
