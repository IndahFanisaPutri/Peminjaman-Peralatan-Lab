<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Sidebar Admin --}}
    @include('layouts.admin-sidebar')

    {{-- Content --}}
    <main class="ml-64 p-8">

        {{-- Header --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

            <h1 class="text-2xl font-bold text-gray-700">
                Data Pengembalian Alat
            </h1>

            <p class="text-gray-400 mt-2">
                Kelola pengajuan pengembalian alat laboratorium
            </p>

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
                        <th class="p-4">Nama Peminjam</th>
                        <th class="p-4">Barang</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Tanggal Pengembalian</th>
                        <th class="p-4">Kondisi</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pengembalian as $item)

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
                            {{ $item->jumlah_dikembalikan }}
                        </td>

                        <td class="p-4">
                            {{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y') }}
                        </td>

                        <td class="p-4">

                            @if($item->kondisi_kembali)

                                @if($item->kondisi_kembali=='baik')

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                        Baik
                                    </span>

                                @elseif($item->kondisi_kembali=='rusak ringan')

                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                                        Rusak Ringan
                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                        Rusak Berat
                                    </span>

                                @endif

                            @else

                                -

                            @endif

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

                            @elseif($item->status=='ditolak')

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                    Ditolak
                                </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <a href="{{ route('admin.pengembalian.show',$item->id) }}"
                               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center py-10 text-gray-400">

                            Belum ada pengajuan pengembalian.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</x-app-layout>