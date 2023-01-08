@section('title')
    Tiket Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Pemesanan Tiket 
    </h2>
</x-slot>

@section('content')

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
              <th class="px-4 py-3">Kode Transaksi</th>
              <th class="px-4 py-3">Tanggal Transaksi</th>
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
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{ $pemesanan->kode }}
              </td>
              <td class="px-4 py-3 text-sm text-center">{{ $pemesanan->tanggal_pemesanan }}</td>
              <td class="px-4 py-3 text-sm">{{ $pemesanan->nama_pengunjung }}</td>
              <td class="px-4 py-3 text-sm">{{ $pemesanan->tiket->nama_tiket }}</td>
              <td class="px-4 py-3 text-sm text-center">{{ $pemesanan->jumlah_tiket }} Tiket</td>
              <td class="px-4 py-3 text-sm text-center">Rp {{ $pemesanan->total_bayar }}
              </td>

              <td class="px-4 py-3 text-center">
                @if ($pemesanan->status == "sukses")
                    <span class="px-2 py-1 bg-green-200 text-green-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</span>
                @else
                    <span class="px-2 py-1 bg-red-200 text-red-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</span>
                @endif
            </td>
            <td class="px-4 py-3 text-center">
                <div class="flex item-center gap-1 justify-center">
                    @if ($pemesanan->status == "sukses")
                        <form action="{{ route('agen.pemesanan.update.status', $pemesanan->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <button type="submit" class="py-1 px-2 bg-yellow-500 text-gray-900 font-medium btn-confirm">Batalkan Pembayaran</button>
                        </form>
                    @else
                        <form action="{{ route('agen.pemesanan.update.status', $pemesanan->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <button type="submit" class="py-1 px-2 bg-green-600 text-white font-medium btn-confirm">Validasi Pembayaran</button>
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

@endsection

@push('addon-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
      $('.btn-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Apakah anda yakin ingin mengubah status?`,
              icon: "info",
              buttons: true,
              dangerMode: false,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>
@endpush