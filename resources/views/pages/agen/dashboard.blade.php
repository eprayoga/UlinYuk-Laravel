@section('title')
Agen Wisata {{ $travel->nama_travel }}
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard Agen Wisata {{ $travel->nama_travel }}
    </h2>
</x-slot>

@section('content')


<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
     Dashboard Agen Wisata {{ $travel->nama_travel }}
    </h2>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Total Pemesanan
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            {{ count($pemesanans) }}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Total Pendapatan
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            Rp {{$total_pendapatan}}
          </p>
        </div>
      </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

    <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
  >
   Transaksi Belum Divalidasi
  </h2>
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Kode Transaksi</th>
              <th class="px-4 py-3">Nama Pengunjung</th>
              <th class="px-4 py-3">Nama Tiket</th>
              <th class="px-4 py-3">Jumlah</th>
              <th class="px-4 py-3">Total Harga</th>
              <th class="px-4 py-3">Status Pembayaran</th>
              <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
          @forelse ($pemesanans as $pemesanan)
            @if ($pemesanan->status == "proses")
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">{{ $pemesanan->kode }}</td>
                <td class="px-4 py-3 text-sm">{{ $pemesanan->nama_pengunjung }}</td>
                <td class="px-4 py-3 text-sm">{{ $pemesanan->tiket->nama_tiket }}</td>
                <td class="px-4 py-3 text-sm text-center">{{ $pemesanan->jumlah_tiket }} Tiket</td>
                <td class="px-4 py-3 text-sm text-center">Rp {{ $pemesanan->total_bayar }}
                </td>

                <td class="px-4 py-3 text-center">
                  @if ($pemesanan->status == "sukses")
                      <span class="px-2 py-1 bg-green-200 text-green-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</span>
                  @else
                      <span class="px-2 py-1 bg-yellow-100 text-yellow-600 font-medium rounded-lg text-center">{{ $pemesanan->status }}</span>
                  @endif
              </td>
              <td class="px-4 py-3 text-center">
                  <div class="flex item-center gap-1 justify-center">
                      @if ($pemesanan->status == "sukses")
                          <form action="{{ route('agen.pemesanan.update.status', $pemesanan->id) }}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('post') }}
                              <button type="submit" class="py-1 px-2 bg-yellow-500 text-gray-900 font-medium">Batalkan Pembayaran</button>
                          </form>
                      @else
                          <form action="{{ route('agen.pemesanan.update.status', $pemesanan->id) }}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('post') }}
                              <button type="submit" class="py-1 px-2 bg-green-600 text-white font-medium">Validasi Pembayaran</button>
                          </form>
                      @endif
                      <a href="{{ route('agen.pemesanan.detail', $pemesanan->id) }}">
                          <div class="py-1 px-2 bg-indigo-500 text-white font-medium">Detail</div>
                      </a>
                  </div>
              </td>
              </tr>
            @endif
            @empty
                <h1 class="text-gray-300 text-center">
                    Belum ada data Tiket
                </h1>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Charts -->
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Charts
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <div
        class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Revenue
        </h4>
        <canvas id="pie"></canvas>
        <div
          class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
        >
          <!-- Chart legend -->
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
            ></span>
            <span>Shirts</span>
          </div>
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
            ></span>
            <span>Shoes</span>
          </div>
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
            ></span>
            <span>Bags</span>
          </div>
        </div>
      </div>
      <div
        class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Traffic
        </h4>
        <canvas id="line"></canvas>
        <div
          class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
        >
          <!-- Chart legend -->
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
            ></span>
            <span>Organic</span>
          </div>
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
            ></span>
            <span>Paid</span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection