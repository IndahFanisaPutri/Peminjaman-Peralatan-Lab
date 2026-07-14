<x-app-layout>

    @include('layouts.user-navbar')

    <div class="min-h-screen bg-gray-100">

        <div class="max-w-7xl mx-auto py-8 px-6">

            {{-- Header --}}
            <div class="bg-white rounded-2xl shadow p-8 mb-8 flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-bold text-indigo-600">
                        Pengembalian Alat
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Lihat status pengembalian serta informasi.
                    </p>

                </div>



            </div>

            @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl mb-6">

                {{ session('success') }}

            </div>

            @endif

            <div class="bg-white rounded-2xl shadow overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="px-6 py-4 text-left">Tanggal Pinjam</th>

                            <th class="px-6 py-4 text-left">Nama Alat</th>

                            <th class="px-6 py-4 text-center">Jumlah</th>

                            <th class="px-6 py-4 text-center">Status</th>

                            <th class="px-6 py-4 text-center">Tanggal Kembali</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengembalian as $item)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-6 py-4">

                                {{ $item->tanggal_pinjam }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $item->alat->nama_alat }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ $item->jumlah_pinjam }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                @switch($item->status)

                                @case('disetujui')

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                                    Sedang Dipinjam

                                </span>

                                @break

                                @case('menunggu_pengembalian')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                    Menunggu Verifikasi

                                </span>

                                @break

                                @case('dikembalikan')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                    Dikembalikan

                                </span>

                                @break

                                @case('ditolak')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                    Ditolak

                                </span>

                                @break

                                @endswitch

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ $item->tanggal_kembali ?? '-' }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6">

                                <div class="py-16 text-center">



                                    <p class="mt-2 text-gray-500">

                                        Silakan ajukan pengembalian setelah peminjaman disetujui.

                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>