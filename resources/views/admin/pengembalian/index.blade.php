<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Sidebar --}}
    @include('layouts.admin-sidebar')

    {{-- Content --}}
    <main class="ml-64 p-8">

        {{-- Header --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

            <h1 class="text-3xl font-bold text-gray-800">
                Data Pengembalian Alat
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola seluruh pengajuan pengembalian alat laboratorium.
            </p>

        </div>

        {{-- Alert --}}
        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-lg mb-6">

                {{ session('success') }}

            </div>

        @endif

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-50 border-b">

                    <tr>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            No
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Nama Peminjam
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Nama Barang
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Jumlah
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Tanggal Pengembalian
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Kondisi
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Status
                        </th>

                        <th class="p-4 text-left font-semibold text-gray-700">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pengembalian as $item)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="p-4 text-gray-700">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-4">

                            <span class="font-medium text-gray-800">

                                {{ $item->nama_peminjam }}

                            </span>

                        </td>

                        <td class="p-4">

                            <span class="font-semibold text-gray-900">

                                {{ $item->alat->nama_alat }}

                            </span>

                        </td>

                        <td class="p-4 text-gray-700">

                            {{ $item->jumlah_pinjam }}

                        </td>

                        <td class="p-4 text-gray-700">

                            @if($item->tanggal_kembali)

                                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}

                            @else

                                -

                            @endif

                        </td>

                        {{-- Kondisi --}}
                        <td class="p-4">

                            @if($item->kondisi_kembali)

                                @if($item->kondisi_kembali=='baik')

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">

                                        Baik

                                    </span>

                                @elseif($item->kondisi_kembali=='rusak ringan')

                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">

                                        Rusak Ringan

                                    </span>

                                @elseif($item->kondisi_kembali=='rusak berat')

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">

                                        Rusak Berat

                                    </span>

                                @endif

                            @else

                                <span class="text-gray-400 italic">

                                    Belum Dicek

                                </span>

                            @endif

                        </td>

                        {{-- Status --}}
                        <td class="p-4">

                            @if($item->status=='menunggu_pengembalian')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">

                                    Menunggu Verifikasi

                                </span>

                            @elseif($item->status=='dikembalikan')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">

                                    Dikembalikan

                                </span>

                            @elseif($item->status=='disetujui')

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">

                                    Dipinjam

                                </span>

                            @elseif($item->status=='ditolak')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">

                                    Ditolak

                                </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <a href="{{ route('admin.pengembalian.show',$item->id) }}"
                               class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center py-10 text-gray-400">

                            Belum ada data pengembalian.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</x-app-layout>