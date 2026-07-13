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

        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 flex justify-between items-center">

            <div>
                <h1 class="text-2xl font-bold text-gray-700">
                    Data Peminjaman Alat
                </h1>

                <p class="text-gray-400 mt-2">
                    Kelola pengajuan peminjaman laboratorium
                </p>
            </div>

            @if(auth()->user()->role == 'user')
                <a href="{{ route('peminjaman.create') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg transition">
                    + Ajukan Peminjaman
                </a>
            @endif

        </div>


        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-lg mb-5">
                {{ session('success') }}
            </div>
        @endif


        <div class="bg-white rounded-xl shadow overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr class="text-left text-gray-600">

                        <th class="p-4">Nama</th>
                        <th class="p-4">NIM</th>
                        <th class="p-4">Alat</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Denda</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($peminjaman as $item)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-4">
                            {{ $item->nama_peminjam }}
                        </td>

                        <td class="p-4">
                            {{ $item->nim_peminjam }}
                        </td>

                        <td class="p-4 font-semibold">
                            {{ $item->alat->nama_alat ?? '-' }}
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

                            @elseif($item->status=='ditolak')

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                    Ditolak
                                </span>

                            @elseif($item->status=='dikembalikan')

                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                                    Dikembalikan
                                </span>

                            @endif

                        </td>

                        <td class="p-4">
                            Rp {{ number_format($item->denda ?? 0,0,',','.') }}
                        </td>

                        <td class="p-4">

                            @if(auth()->user()->role=='admin')

                                @if($item->status=='menunggu')

                                    <div class="flex gap-2">

                                        <form action="{{ route('peminjaman.setujui',$item->id) }}" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                                ✔ Setujui
                                            </button>

                                        </form>

                                        <form action="{{ route('peminjaman.tolak',$item->id) }}" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                ✖ Tolak
                                            </button>

                                        </form>

                                    </div>

                                @elseif($item->status=='disetujui')

                                    <form action="{{ route('peminjaman.kembali',$item->id) }}" method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                            🔄 Kembalikan
                                        </button>

                                    </form>

                                @else

                                    <span class="text-gray-400">-</span>

                                @endif

                            @else

                                <span class="text-gray-500">
                                    Menunggu tindakan Admin
                                </span>

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