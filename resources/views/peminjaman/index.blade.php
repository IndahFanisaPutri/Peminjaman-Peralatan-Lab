<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Navigasi --}}
    @if(auth()->user()->role == 'admin')
        @include('layouts.admin-sidebar')
    @else
        @include('layouts.user-navbar')
    @endif

    {{-- Content --}}
    <main class="{{ auth()->user()->role == 'admin' ? 'ml-64' : '' }} p-8">

        {{-- Header --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 flex justify-between items-center">

            <div>
                <h1 class="text-2xl font-bold text-gray-700">
                    Data Peminjaman Alat
                </h1>

                <p class="text-gray-400 mt-2">
                    Kelola pengajuan peminjaman laboratorium
                </p>
            </div>

            @if(auth()->user()->role=='user')
                <a href="{{ route('peminjaman.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg transition">
                    + Ajukan Peminjaman
                </a>
            @endif

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

                        <th class="p-4">Nama</th>
                        <th class="p-4">NIM</th>
                        <th class="p-4">Alat</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($peminjaman as $item)

                    <tr class="border-t hover:bg-gray-50">

                        {{-- Nama --}}
                        <td class="p-4">
                            {{ $item->nama_peminjam }}
                        </td>

                        {{-- NIM --}}
                        <td class="p-4">
                            {{ $item->nim_peminjam }}
                        </td>

                        {{-- Nama Alat --}}
                        <td class="p-4 font-semibold">
                            {{ $item->alat->nama_alat ?? '-' }}
                        </td>

                        {{-- Jumlah --}}
                        <td class="p-4">
                            {{ $item->jumlah_pinjam }}
                        </td>

                        {{-- STATUS --}}
                        <td class="p-4">

                            @switch($item->status)

                                @case('menunggu')

                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-sm font-medium">
                                         Menunggu Persetujuan
                                    </span>

                                @break

                                @case('disetujui')

                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">
                                         Disetujui
                                    </span>

                                @break

                                @case('menunggu_pengembalian')

                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-sm font-medium">
                                         Menunggu Verifikasi
                                    </span>

                                @break

                                @case('dikembalikan')

                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-100 text-indigo-800 text-sm font-medium">
                                        ✔ Sudah Dikembalikan
                                    </span>

                                @break

                                @case('ditolak')

                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-medium">
                                         Ditolak
                                    </span>

                                @break

                                @default

                                    <span class="text-gray-500">
                                        -
                                    </span>

                            @endswitch

                        </td>


                        {{-- AKSI --}}
                        <td class="p-4">

                            {{-- ================= ADMIN ================= --}}
                            @if(auth()->user()->role=='admin')

                            
                                @if($item->status=='menunggu')

                                    <div class="flex items-center gap-2">

                                        <form action="{{ route('peminjaman.setujui', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                                                Setujui
                                            </button>
                                        </form>

                                            <form action="{{ route('peminjaman.tolak', $item->id) }}"
                                                method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                                                     Tolak
                                                </button>

                                            </form>

                                        </div>
                                @elseif($item->status=='disetujui')

                                    <form action="{{ route('peminjaman.kembali',$item->id) }}" method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">

                                            Kembalikan

                                        </button>

                                    </form>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            {{-- ================= USER ================= --}}
                            @else

                                @switch($item->status)

                                    @case('menunggu')

                                        <span class="text-yellow-600 text-sm font-medium">
                                            Menunggu persetujuan admin
                                        </span>

                                    @break

                                    @case('disetujui')

                                        <a href="{{ route('pengembalian.create') }}"
                                            class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">

                                            Ajukan Pengembalian

                                        </a>

                                    @break

                                    @case('menunggu_pengembalian')

                                        <span class="text-blue-600 text-sm font-medium">
                                            Pengembalian sedang diverifikasi
                                        </span>

                                    @break

                                    @case('dikembalikan')

                                        <span class="text-green-600 text-sm font-medium">
                                            Pengembalian selesai
                                        </span>

                                    @break

                                    @case('ditolak')

                                        <span class="text-red-600 text-sm font-medium">
                                            Peminjaman ditolak
                                        </span>

                                    @break

                                    @default

                                        <span class="text-gray-500">
                                            -
                                        </span>

                                @endswitch

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-10 text-gray-400">

                            Belum ada data peminjaman.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</x-app-layout>