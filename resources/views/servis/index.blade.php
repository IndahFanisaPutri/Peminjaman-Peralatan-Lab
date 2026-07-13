<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Sidebar Admin --}}
    @include('layouts.admin-sidebar')

    {{-- Content --}}
    <main class="ml-64 p-8">

        {{-- Header --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 flex justify-between items-center">

            <div>

                <h1 class="text-2xl font-bold text-gray-700">
                    Jadwal Servis Alat
                </h1>

                <p class="text-gray-400 mt-2">
                    Kelola perawatan dan kondisi alat laboratorium
                </p>

            </div>

            <a href="{{ route('servis.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg transition">

                + Tambah Servis

            </a>

        </div>

        {{-- Alert --}}
        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-lg mb-5">

                {{ session('success') }}

            </div>

        @endif

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr class="text-left text-gray-600">

                        <th class="p-4">No</th>

                        <th class="p-4">Nama Alat</th>

                        <th class="p-4">Tanggal Servis</th>

                        <th class="p-4">Teknisi</th>

                        <th class="p-4">Kerusakan</th>

                        <th class="p-4">Status</th>

                        <th class="p-4 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($servis as $item)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-4 font-semibold">
                            {{ $item->alat->nama_alat }}
                        </td>

                        <td class="p-4">
                            {{ \Carbon\Carbon::parse($item->tanggal_service)->format('d M Y') }}
                        </td>

                        <td class="p-4">
                            {{ $item->teknisi }}
                        </td>

                        <td class="p-4">
                            {{ $item->kerusakan }}
                        </td>

                        <td class="p-4">

                            @if($item->status == 'selesai')

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                    Selesai
                                </span>

                            @elseif($item->status == 'proses')

                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                                    Proses
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                    Pending
                                </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <div class="flex items-center justify-center gap-3">

                                <a href="{{ route('servis.edit',$item->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm">

                                    Edit

                                </a>

                                <form action="{{ route('servis.destroy',$item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data servis ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-10 text-gray-500">

                            Belum ada data servis alat.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</x-app-layout>