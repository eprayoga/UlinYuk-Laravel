<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Tiket {{ $travel->nama_travel }} </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"
    />

    <!-- Fontawesome -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />


    <link rel="stylesheet" href="{{ asset('styles/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/navbar.css') }}" />
</head>
<body>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <h1 class="text-center text-gray-800 font-bold text-2xl">Detail Tiket {{ $travel->nama_travel }}</h1>
        <div class="relative py-3 max-w-7xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-full mx-auto">
            <div class="flex items-center space-x-5">
                <div class="h-14 w-14 bg-gray-200 rounded-2xl overflow-hidden flex flex-shrink-0 justify-center items-center text-gray-500 text-2xl font-mono">
                    <img src="{{ Storage::url($travel->galeris->first()->foto) }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                <h2 class="leading-relaxed">{{ $travel->nama_travel }}</h2>
                <p class="text-sm text-gray-500 font-normal leading-relaxed">{{ $pemesanan->tiket->nama_tiket }}</p>
                </div>
            </div>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-1 text-gray-700 sm:text-lg sm:leading-7">
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Status Pembayaran</label>
                    @if ($pemesanan->status == "lunas")
                        <div class="px-2 py-1 bg-green-200 text-green-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</div>
                    @else
                        <div class="px-2 py-1 bg-red-200 text-red-500 font-medium rounded-lg text-center">{{ $pemesanan->status }}</div>
                    @endif
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Kode Tiket</label>
                    <div class="text-right font-bold">{{ $pemesanan->kode }}</div>
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Tanggal Kunjungan</label>
                    <div class="text-right font-bold">{{ $pemesanan->tanggal_kunjungan }}</div>
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Nama Pengunjung</label>
                    <div class="text-right font-bold">{{ $pemesanan->nama_pengunjung }}</div>
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Email Pengunjung</label>
                    <div class="text-right font-bold">{{ $pemesanan->email_pengunjung }}</div>
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Nomor Pengunjung</label>
                    <div class="text-right font-bold">{{ $pemesanan->nomor_pengunjung }}</div>
                </div>
                <div class="flex flex-col">
                    <label class="leading-loose">Permintaan Khusus :</label>
                    <div class="text-left p-4 bg-gray-200 rounded-xl font-bold">{{ $pemesanan->permintaan }}</div>
                </div>
                <br>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Tanggal Pemesanan</label>
                    <div class="text-right font-bold">{{ $pemesanan->tanggal_pemesanan }}</div>
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Harga Tiket</label>
                    <div class="text-right font-bold">Rp {{ $pemesanan->tiket->harga }}</div>
                </div>
                <div class="flex gap-x-28 justify-between">
                    <label class="leading-loose">Jumlah Pemesanan</label>
                    <div class="text-right font-bold">{{ $pemesanan->jumlah_tiket }}</div>
                </div>
                <br>
                <div class="flex gap-28 justify-between items-end">
                    <label class="leading-loose">Total Bayar</label>
                    <div class="text-right font-bold text-3xl text-indigo-600">Rp {{ $pemesanan->total_bayar }}</div>
                </div>
                </div>
                <div class="pt-4 flex items-center flex-col gap-3">
                    <a href="{{ route('agen.pemesanan') }}" class="bg-gray-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md transition-all ease-in duration-300 font-bold hover:bg-gray-700 focus:outline-none">Kembali</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>