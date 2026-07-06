<x-app-layout>

<div class="min-h-screen bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">

        <div class="h-20 flex items-center px-8">
            <div class="text-3xl text-indigo-500 font-bold">
                S
            </div>

            <h1 class="ml-3 text-xl font-bold text-gray-700">
                SilaLab
            </h1>
        </div>

        <nav class="px-5 space-y-2">

            <a href="{{ route('dashboard') }}"
                class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                🏠 Dashboard

            </a>

            <a href="{{ route('alat.index') }}"
                class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                ⚙️ Peralatan

            </a>

            <a href="{{ route('peminjaman.index') }}"
                class="flex gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">

                📦 Peminjaman

            </a>

            @if(auth()->user()->role=='admin')

            <a href="#"
                class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                📊 Laporan

            </a>

            @endif

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button class="w-full text-left px-4 py-3 text-red-500">

                    🚪 Logout

                </button>

            </form>

        </nav>

    </aside>





    <!-- CONTENT -->

    <main class="flex-1 p-8">

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
                class="bg-indigo-500 text-white px-5 py-3 rounded-lg">

                + Ajukan Peminjaman

            </a>

            @endif

        </div>





        @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">

            {{ session('success') }}

        </div>

        @endif






        <div class="bg-white shadow-sm rounded-xl p-6 overflow-x-auto">

            <table class="w-full text-left">

                <thead>

                    <tr class="border-b text-gray-500">

                        <th class="p-3">Nama</th>

                        <th class="p-3">NIM</th>

                        <th class="p-3">Alat</th>

                        <th class="p-3">Jumlah</th>

                        <th class="p-3">Status</th>

                        <th class="p-3">Denda</th>

                        <th class="p-3">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($peminjaman as $item)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">

                            {{ $item->nama_peminjam }}

                        </td>

                        <td class="p-3">

                            {{ $item->nim_peminjam }}

                        </td>

                        <td class="p-3 font-semibold">

                            {{ $item->alat->nama_alat ?? '-' }}

                        </td>

                        <td class="p-3">

                            {{ $item->jumlah_pinjam }}

                        </td>

                        <td class="p-3">

                            @if($item->status=='menunggu')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                    Menunggu

                                </span>

                            @elseif($item->status=='disetujui')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                    Disetujui

                                </span>

                            @elseif($item->status=='ditolak')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                    Ditolak

                                </span>

                            @elseif($item->status=='dikembalikan')

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                                    Dikembalikan

                                </span>

                            @endif

                        </td>

                        <td class="p-3">

                            Rp {{ number_format($item->denda ?? 0,0,',','.') }}

                        </td>





                        <td class="p-3">

                        @if(auth()->user()->role == 'admin')

                            @if($item->status == 'menunggu')

                                <div class="flex gap-2">

                                    <form action="{{ route('peminjaman.setujui',$item->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">

                                            ✔ Setujui

                                        </button>

                                    </form>





                                    <form action="{{ route('peminjaman.tolak',$item->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">

                                            ✖ Tolak

                                        </button>

                                    </form>

                                </div>





                            @elseif($item->status == 'disetujui')

                                <form action="{{ route('peminjaman.kembali',$item->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">

                                        🔄 Kembalikan

                                    </button>

                                </form>

                            @else

                                -

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

                        <td colspan="7" class="text-center py-8 text-gray-500">

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