@section('title')
    Admin Data Travel
@endsection

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Travel
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-hidden py-5">
                <div class="w-full lg:w-5/6">
                    <a href="{{ route('admin.data.travel.create') }}" class="my-10 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Tambah Travel
                      </a>
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nama Travel</th>
                                    <th class="py-3 px-6 text-center">Kategori</th>
                                    <th class="py-3 px-6 text-center">Lokasi</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($travels as $travel)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{ $travel->nama_travel }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                                <span class="font-medium">{{ $travel->kategori->nama_kategori }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                                <span class="font-medium">{{ $travel->regencies->name }}, {{ $travel->provinces->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            @if ($travel->status == 1)
                                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs font-medium">Aktif</span>
                                            @else
                                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs font-medium">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                                <a href="{{ route('admin.data.travel.edit', $travel->id) }}">
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div>
                                                </a>
                                                <form action="{{ route('admin.data.travel.delete', $travel->id) }}" method="post">
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
                                        Belum ada data travel
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
