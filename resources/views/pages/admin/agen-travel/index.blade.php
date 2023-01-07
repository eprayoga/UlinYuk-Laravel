@section('title')
    Admin Data Agen
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Agen Travel
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-hidden py-5">
                <div class="w-full lg:w-5/6">
                    <a href="{{ route('admin.data.agen.create') }}" class="my-10 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Daftarkan Agen Travel
                      </a>
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center">ID Agen</th>
                                    <th class="py-3 px-6 text-left">Nama</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-left">Travel</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($agens as $agen)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-center whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <span class="font-medium">{{ $agen->id }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                                <span class="font-medium">{{ $agen->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                                <span class="font-medium">{{ $agen->email }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                                <span class="font-medium">{{ $agen->travel->nama_travel }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <a href="">
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div>
                                                </a>
                                                <form action="" method="post">
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
                                        Belum ada data Kategori
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
