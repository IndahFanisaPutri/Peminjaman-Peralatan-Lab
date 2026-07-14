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
                        Data Alat Laboratorium
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Kelola seluruh peralatan laboratorium
                    </p>

                </div>

                <a href="{{ route('alat.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg transition">

                    + Tambah Alat

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

                            <th class="p-4">Foto</th>

                            <th class="p-4">Kode</th>

                            <th class="p-4">Nama Alat</th>

                            <th class="p-4">Kategori</th>

                            <th class="p-4">Jumlah</th>

                            <th class="p-4">Status</th>

                            <th class="p-4 text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($alat as $item)

                        <tr class="border-t hover:bg-gray-50">

                            {{-- Foto --}}
                            <td class="p-4">

                                @if($item->foto)

                                <img
                                    src="{{ asset('storage/'.$item->foto) }}"
                                    class="w-16 h-16 rounded-lg object-cover">

                                @else

                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">

                                    -

                                </div>

                                @endif

                            </td>

                            {{-- Kode --}}
                            <td class="p-4">

                                {{ $item->kode_alat }}

                            </td>

                            {{-- Nama --}}
                            <td class="p-4 font-semibold">

                                {{ $item->nama_alat }}

                            </td>

                            {{-- Kategori --}}
                            <td class="p-4">

                                {{ $item->kategori }}

                            </td>

                            {{-- Jumlah --}}
                            <td class="p-4">

                                {{ $item->jumlah }}

                            </td>

                            {{-- Status --}}
                            <td class="p-4">

                                @if($item->jumlah_tersedia > 0)

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                                    Tersedia

                                </span>

                                @else

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">

                                    Habis

                                </span>

                                @endif

                            </td>

                            {{-- Aksi --}}
                            <td class="p-4">

                                <div class="flex items-center justify-center gap-3">

                                    <a href="{{ route('alat.show',$item->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg text-sm">

                                        Detail

                                    </a>

                                    <a href="{{ route('alat.edit',$item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('alat.destroy',$item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus alat ini?')">

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

                            <td colspan="7"
                                class="text-center py-10 text-gray-500">

                                Belum ada data alat laboratorium.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</x-app-layout>