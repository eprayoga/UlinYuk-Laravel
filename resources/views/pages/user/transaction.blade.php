@extends('layouts.user.dashboard')

@section('title')
    Transaksi
@endsection

@section('content')
  <div class="content">
      <h1>Tiket Saya</h1>

      <div 
      x-data="{
        openTab: '{{ request()->get('tab') ? request()->get('tab') : "semua" }}',
        activeClasses: 'border-l border-t border-r rounded-t text-white bg-[#6D67E4]',
        inactiveClasses: 'text-[#6D67E4] hover:text-blue-800'
      }" 
      class="p-6"
    >
      <ul class="flex border-b">
        <li @click="openTab = 'semua'" :class="{ '-mb-px': openTab === 'semua' }" class="-mb-px mr-1">
          <a :class="openTab === 'semua' ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
            Semua
          </a>
        </li>
        <li @click="openTab = 'sukses'" :class="{ '-mb-px': openTab === 'sukses' }" class="mr-1">
          <a :class="openTab === 'sukses' ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Sukses</a>
        </li>
        <li @click="openTab = 'proses'" :class="{ '-mb-px': openTab === 'proses' }" class="mr-1">
          <a :class="openTab === 'proses' ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Proses</a>
        </li>
      </ul>
      <div class="w-full pt-4">
        <div x-show="openTab === 'semua'">
          <div class="flex flex-col gap-4 w-full">
            @forelse ($transactions as $transaction)
            <a href="{{ route('user.transaction.detail', $transaction->id) }}" class="flex justify-between rounded-lg bg-white shadow-lg w-full cursor-pointer hover:scale-105 ease-in duration-300">
              <div class="flex flex-col md:flex-row md:max-w-xl"></div>
              <img class="w-60 h-40 object-cover rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ Storage::url($transaction->travel->galeris->first()->foto) }}" alt="" />
              <div class="p-6 flex flex-col justify-start w-full">
                <h5 class="text-gray-900 text-xl font-medium">{{ $transaction->travel->nama_travel }}</h5>
                <p class="text-gray-700 text-base">
                  {{ $transaction->tiket->nama_tiket }} <span class="font-light">x{{ $transaction->jumlah_tiket }}</span>
                </p>
                <p class="text-gray-600 text-xs mb-4">Tanggal Kunjungan : {{ $transaction->tanggal_kunjungan }}</p>
                <p><span class="font-bold text-blue-600 text-xl">Rp {{ $transaction->total_bayar }}</span></p>
              </div>
              @if ($transaction->status == "sukses")
                <div class="m-6 py-1 px-2 bg-[#6ABAA4] rounded-lg h-min w-max text-xs whitespace-nowrap text-white">Sukses</div>
              @else
                <div class="m-6 py-1 px-2 bg-yellow-400 rounded-lg h-min w-max text-xs whitespace-nowrap text-black">Proses</div>
              @endif
            </a>
            @empty
              <div class="flex flex-col items-center gap-3 w-full">
                <h3 class="text-center text-gray-500">Anda Belum Memiliki transaction</h3>
                <a href="/" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                  Silahakan cari tiket dahulu
                </a>
              </div>
            @endforelse
          </div>
        </div>

        <div x-show="openTab === 'sukses'">
          <div class="flex flex-col gap-4 w-full">
          @forelse ($transactions as $transaction)
          @if ($transaction->status == "sukses")
          <a href="{{ route('user.transaction.detail', $transaction->id) }}" class="flex justify-between rounded-lg bg-white shadow-lg w-full cursor-pointer hover:scale-105 ease-in duration-300">
            <div class="flex flex-col md:flex-row md:max-w-xl"></div>
            <img class="w-60 h-40 object-cover rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ Storage::url($transaction->travel->galeris->first()->foto) }}" alt="" />
            <div class="p-6 flex flex-col justify-start w-full">
              <h5 class="text-gray-900 text-xl font-medium">{{ $transaction->travel->nama_travel }}</h5>
              <p class="text-gray-700 text-base">
                {{ $transaction->tiket->nama_tiket }} <span class="font-light">x{{ $transaction->jumlah_tiket }}</span>
              </p>
              <p class="text-gray-600 text-xs mb-4">Tanggal Kunjungan : {{ $transaction->tanggal_kunjungan }}</p>
              <p><span class="font-bold text-blue-600 text-xl">Rp {{ $transaction->total_bayar }}</span></p>
            </div>
            @if ($transaction->status == "sukses")
              <div class="m-6 py-1 px-2 bg-[#6ABAA4] rounded-lg h-min w-max text-xs whitespace-nowrap text-white">Sukses</div>
            @else
              <div class="m-6 py-1 px-2 bg-yellow-400 rounded-lg h-min w-max text-xs whitespace-nowrap text-black">Proses</div>
            @endif
          </a>
          @endif
          
          @empty
          <div class="flex flex-col items-center gap-3 w-full">
            <h3 class="text-center text-gray-500">Anda Belum Memiliki transaction</h3>
            <a href="/" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
              Silahakan cari tiket dahulu
            </a>
          </div>
          @endforelse
        </div>
        </div>

        <div x-show="openTab === 'proses'">
          <div class="flex flex-col gap-4 w-full">
          @forelse ($transactions as $transaction)
          @if ($transaction->status == "proses")
          <a href="{{ route('user.transaction.detail', $transaction->id) }}" class="flex justify-between rounded-lg bg-white shadow-lg w-full cursor-pointer hover:scale-105 ease-in duration-300">
            <div class="flex flex-col md:flex-row md:max-w-xl"></div>
            <img class="w-60 h-40 object-cover rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ Storage::url($transaction->travel->galeris->first()->foto) }}" alt="" />
            <div class="p-6 flex flex-col justify-start w-full">
              <h5 class="text-gray-900 text-xl font-medium">{{ $transaction->travel->nama_travel }}</h5>
              <p class="text-gray-700 text-base">
                {{ $transaction->tiket->nama_tiket }} <span class="font-light">x{{ $transaction->jumlah_tiket }}</span>
              </p>
              <p class="text-gray-600 text-xs mb-4">Tanggal Kunjungan : {{ $transaction->tanggal_kunjungan }}</p>
              <p><span class="font-bold text-blue-600 text-xl">Rp {{ $transaction->total_bayar }}</span></p>
            </div>
            @if ($transaction->status == "sukses")
              <div class="m-6 py-1 px-2 bg-[#6ABAA4] rounded-lg h-min w-max text-xs whitespace-nowrap text-white">Sukses</div>
            @else
              <div class="m-6 py-1 px-2 bg-yellow-400 rounded-lg h-min w-max text-xs whitespace-nowrap text-black">Proses</div>
            @endif
          </a>
          @endif
          
          @empty
          <div class="flex flex-col items-center gap-3 w-full">
            <h3 class="text-center text-gray-500">Anda Belum Memiliki transaction</h3>
            <a href="/" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
              Silahakan cari tiket dahulu
            </a>
          </div>
          @endforelse
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection