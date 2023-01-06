@section('title')
    Tiket Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Pemesanan Tiket 
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-scroll py-5 ">
                <div class="w-full overflow-scroll">
                      <div class="bg-white shadow-md rounded my-6 overflow-scroll">
                        <table class="min-w-max w-full table-auto overflow-scroll">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Kode Transaksi</th>
                                    <th class="py-3 px-6 text-left">Tanggal Transaksi</th>
                                    <th class="py-3 px-6 text-left">Nama Pengunjung</th>
                                    <th class="py-3 px-6 text-left">Nama Tiket</th>
                                    <th class="py-3 px-6 text-left">Jumlah</th>
                                    <th class="py-3 px-6 text-left">Total Harga</th>
                                    <th class="py-3 px-6 text-left">Status Pembayaran</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($pemesanans as $pemesanan)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-center">
                                                <span class="font-medium">{{ $pemesanan->kode }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                                <span class="font-medium">{{ $pemesanan->tanggal_pemesanan }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                                <span class="font-medium">{{ $pemesanan->nama_pengunjung }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                                <span class="font-medium">{{ $pemesanan->tiket->nama_tiket }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                                <span class="font-medium">{{ $pemesanan->jumlah_tiket }} Tiket</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                                <span class="font-medium">Rp {{ $pemesanan->total_bayar }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            @if ($pemesanan->status == "sukses")
                                                <span class="px-2 py-1 bg-green-200 text-green-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</span>
                                            @else
                                                <span class="px-2 py-1 bg-red-200 text-red-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-6 text-center">
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
    </div>
</div>
