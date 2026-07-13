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
                    Laporan Laboratorium
                </h1>

                <p class="text-gray-400 mt-2">
                    Rekap data peminjaman dan penggunaan alat laboratorium.
                </p>

            </div>

            <button
                onclick="window.print()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg transition">

                🖨 Cetak Laporan

            </button>

        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Total Peminjaman
                </p>

                <h2 class="text-4xl font-bold text-indigo-600 mt-2">
                    {{ $totalPeminjaman ?? 0 }}
                </h2>

            </div>

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Disetujui
                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-2">
                    {{ $disetujui ?? 0 }}
                </h2>

            </div>

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Dikembalikan
                </p>

                <h2 class="text-4xl font-bold text-blue-600 mt-2">
                    {{ $dikembalikan ?? 0 }}
                </h2>

            </div>

        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr class="text-left text-gray-600">

                        <th class="p-4">No</th>
                        <th class="p-4">Nama Peminjam</th>
                        <th class="p-4">Nama Alat</th>
                        <th class="p-4">Tanggal Pinjam</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($laporan as $item)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-4">
                            {{ $item->nama_peminjam }}
                        </td>

                        <td class="p-4 font-semibold">
                            {{ $item->alat->nama_alat }}
                        </td>

                        <td class="p-4">
                            {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                        </td>

                        <td class="p-4">
                            {{ $item->jumlah_pinjam }}
                        </td>

                        <td class="p-4">

                            @if($item->status=='menunggu')

                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                                    Menunggu
                                </span>

                            @elseif($item->status=='disetujui')

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                    Disetujui
                                </span>

                            @elseif($item->status=='menunggu_pengembalian')

                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                                    Menunggu Pengembalian
                                </span>

                            @elseif($item->status=='dikembalikan')

                                <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700">
                                    Dikembalikan
                                </span>

                            @elseif($item->status=='ditolak')

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                    Ditolak
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-10 text-gray-500">

                            Belum ada data laporan.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</x-app-layout>