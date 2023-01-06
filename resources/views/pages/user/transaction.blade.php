@extends('layouts.user.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
  <div class="content">
      <h1>Tiket Saya</h1>

      <div 
      x-data="{
        openTab: 1,
        activeClasses: 'border-l border-t border-r rounded-t text-white bg-[#6D67E4]',
        inactiveClasses: 'text-[#6D67E4] hover:text-blue-800'
      }" 
      class="p-6"
    >
      <ul class="flex border-b">
        <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
          <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
            Semua
          </a>
        </li>
        <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
          <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Sukses</a>
        </li>
        <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1">
          <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Proses</a>
        </li>
      </ul>
      <div class="w-full pt-4">
        <div x-show="openTab === 1">
          <div class="flex flex-col gap-4 w-full">
            @forelse ($transactions as $transaction)
            <div class="flex justify-between rounded-lg bg-white shadow-lg w-full">
              <div class="flex flex-col md:flex-row md:max-w-xl"></div>
              <img class="w-60 h-40 object-cover rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ Storage::url($transaction->travel->galeris->first()->foto) }}" alt="" />
              <div class="p-6 flex flex-col justify-start w-full">
                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $transaction->travel->nama_travel }}</h5>
                <p class="text-gray-700 text-base mb-4">
                  {{ $transaction->tiket->nama_tiket }} <span class="font-light">x{{ $transaction->jumlah_tiket }}</span>
                </p>
                <p class="text-gray-600 text-xs">Tanggal Kunjungan : {{ $transaction->tanggal_kunjungan }}</p>
              </div>
              @if ($transaction->status == "sukses")
                <div class="m-6 py-1 px-2 bg-[#6ABAA4] rounded-lg h-min w-max text-xs whitespace-nowrap text-white">Sukses</div>
              @else
                <div class="m-6 py-1 px-2 bg-yellow-400 rounded-lg h-min w-max text-xs whitespace-nowrap text-black">Proses</div>
              @endif
            </div>
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

        <div x-show="openTab === 2">
          <div class="flex flex-col gap-4 w-full">
          @forelse ($transactions as $transaction)
          @if ($transaction->status == "sukses")
            <div class="flex justify-between rounded-lg bg-white shadow-lg w-full">
              <div class="flex flex-col md:flex-row md:max-w-xl"></div>
              <img class="w-60 h-40 object-cover rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ Storage::url($transaction->travel->galeris->first()->foto) }}" alt="" />
              <div class="p-6 flex flex-col justify-start w-full">
                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $transaction->travel->nama_travel }}</h5>
                <p class="text-gray-700 text-base mb-4">
                  {{ $transaction->tiket->nama_tiket }} <span class="font-light">x{{ $transaction->jumlah_tiket }}</span>
                </p>
                <p class="text-gray-600 text-xs">Tanggal Kunjungan : {{ $transaction->tanggal_kunjungan }}</p>
              </div>
              @if ($transaction->status == "sukses")
                <div class="m-6 py-1 px-2 bg-[#6ABAA4] rounded-lg h-min w-max text-xs whitespace-nowrap text-white">Sukses</div>
              @else
                <div class="m-6 py-1 px-2 bg-yellow-400 rounded-lg h-min w-max text-xs whitespace-nowrap text-black">Proses</div>
              @endif
            </div>
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

        <div x-show="openTab === 3">
          <div class="flex flex-col gap-4 w-full">
          @forelse ($transactions as $transaction)
          @if ($transaction->status == "proses")
            <div class="flex justify-between rounded-lg bg-white shadow-lg w-full">
              <div class="flex flex-col md:flex-row md:max-w-xl"></div>
              <img class="w-60 h-40 object-cover rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ Storage::url($transaction->travel->galeris->first()->foto) }}" alt="" />
              <div class="p-6 flex flex-col justify-start w-full">
                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $transaction->travel->nama_travel }}</h5>
                <p class="text-gray-700 text-base mb-4">
                  {{ $transaction->tiket->nama_tiket }} <span class="font-light">x{{ $transaction->jumlah_tiket }}</span>
                </p>
                <p class="text-gray-600 text-xs">Tanggal Kunjungan : {{ $transaction->tanggal_kunjungan }}</p>
              </div>
              @if ($transaction->status == "sukses")
                <div class="m-6 py-1 px-2 bg-[#6ABAA4] rounded-lg h-min w-max text-xs whitespace-nowrap text-white">Sukses</div>
              @else
                <div class="m-6 py-1 px-2 bg-yellow-400 rounded-lg h-min w-max text-xs whitespace-nowrap text-black">Proses</div>
              @endif
            </div>
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