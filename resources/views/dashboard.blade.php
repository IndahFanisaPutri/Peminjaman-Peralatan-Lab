<x-app-layout>

    <div class="min-h-screen bg-gray-100">

        {{-- Sidebar Admin --}}
        @include('layouts.admin-sidebar')

        {{-- Content --}}
        <main class="ml-64 p-6">

            {{-- Topbar --}}
            <div class="bg-white rounded-xl shadow-sm px-6 py-4 flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Dashboard Admin
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Selamat datang kembali
                        <span class="font-semibold text-indigo-600">
                            {{ auth()->user()->name }}
                        </span>
                    </p>
                </div>

                {{-- Profil Admin --}}
                <div x-data="{ open: false }" class="relative">

                    <button
                        @click="open = !open"
                        class="flex items-center gap-3 hover:bg-gray-100 px-3 py-2 rounded-lg transition">

                        <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </div>

                        <div class="text-left hidden md:block">

                            <p class="font-semibold text-gray-700">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-gray-500">

                                Administrator

                            </p>

                        </div>

                        <svg class="w-4 h-4 text-gray-500"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7" />

                        </svg>

                    </button>


                    {{-- Dropdown --}}
                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border overflow-hidden z-50">

                        <div class="px-4 py-3 border-b">

                            <p class="font-semibold text-gray-700">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-sm text-gray-500">

                                {{ auth()->user()->email }}

                            </p>

                        </div>


                        <a href="{{ route('admin.profile') }}"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition">

                            <span>Profil</span>

                        </a>


                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button
                                class="w-full text-left flex items-center gap-3 px-4 py-3 hover:bg-red-50 text-red-600 transition">

                                <span>Logout</span>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            {{-- Welcome --}}
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white shadow">

                <h2 class="text-3xl font-bold">
                    Selamat Datang Admin
                </h2>

                <p class="mt-3 opacity-90">
                    Sistem Informasi Peminjaman Peralatan Laboratorium.
                </p>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                {{-- Jumlah Alat --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Jumlah Alat
                    </p>

                    <h1 class="text-4xl font-bold text-indigo-600 mt-2">
                        {{ $jumlahAlat }}
                    </h1>

                </div>

                {{-- Menunggu Persetujuan --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Menunggu Persetujuan
                    </p>

                    <h1 class="text-4xl font-bold text-yellow-500 mt-2">
                        {{ $menunggu }}
                    </h1>

                </div>

                {{-- Sedang Dipinjam --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Sedang Dipinjam
                    </p>

                    <h1 class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $dipinjam }}
                    </h1>

                </div>

                {{-- Sudah Dikembalikan --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Sudah Dikembalikan
                    </p>

                    <h1 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $dikembalikan }}
                    </h1>

                </div>

            </div>

            <div class="mt-10 mb-5">

                <h2 class="text-2xl font-bold text-gray-800">

                    Manajemen Sistem Laboratorium

                </h2>

                <p class="text-gray-500 mt-1">

                    Akses cepat ke seluruh fitur utama Sistem Informasi Peminjaman Peralatan Laboratorium.

                </p>

            </div>


            {{-- Menu Cepat --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                <a href="{{ route('alat.index') }}"
                    class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>



                            <h2 class="text-xl font-bold text-gray-800 mt-1">
                                Data Peralatan
                            </h2>

                        </div>

                        <div class="text-5xl">

                        </div>

                    </div>

                    <p class="text-gray-500 mt-5">

                        Kelola seluruh data inventaris laboratorium mulai dari
                        penambahan, perubahan hingga penghapusan data alat.

                    </p>

                    <div class="mt-5 text-indigo-600 font-semibold">

                        Lanjutkan →

                    </div>

                </a>

                <a href="{{ route('peminjaman.index') }}"
                    class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>



                            <h2 class="text-xl font-bold text-gray-800 mt-1">
                                Data Peminjaman
                            </h2>

                        </div>

                        <div class="text-5xl">

                        </div>

                    </div>

                    <p class="text-gray-500 mt-5">

                        Kelola seluruh pengajuan peminjaman,
                        persetujuan hingga riwayat peminjaman alat.

                    </p>

                    <div class="mt-5 text-indigo-600 font-semibold">

                        Lanjutkan →

                    </div>

                </a>

                <a href="{{ route('servis.index') }}"
                    class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>



                            <h2 class="text-xl font-bold text-gray-800 mt-1">
                                Servis Peralatan
                            </h2>

                        </div>

                        <div class="text-5xl">

                        </div>

                    </div>

                    <p class="text-gray-500 mt-5">

                        Pantau proses servis, perawatan,
                        dan kondisi setiap peralatan laboratorium.

                    </p>

                    <div class="mt-5 text-indigo-600 font-semibold">

                        Lanjutkan →

                    </div>

                </a>

                <a href="{{ route('laporan.index') }}"
                    class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>


                            <h2 class="text-xl font-bold text-gray-800 mt-1">
                                Laporan Sistem
                            </h2>

                        </div>

                        <div class="text-5xl">

                        </div>

                    </div>

                    <p class="text-gray-500 mt-5">

                        Lihat laporan peminjaman,
                        pengembalian serta statistik penggunaan alat.

                    </p>

                    <div class="mt-5 text-indigo-600 font-semibold">

                        Lanjutkan →

                    </div>

                </a>

            </div>

            {{-- Alat Hampir Habis --}}
            <div class="bg-white rounded-xl shadow mt-8">

                {{-- Header --}}
                <div class="bg-white rounded-xl shadow mt-6 p-4">

                    <div>

                        <h2 class="text-xl font-bold mb-2">
                            Alat hampir habis
                        </h2>

                    </div>


                </div>

                {{-- Isi --}}
                <div class="p-5">

                    @forelse($alatHampirHabis as $alat)

                    <div class="flex items-center justify-between border rounded-xl p-4 mb-4 hover:shadow-md transition">

                        {{-- Icon --}}
                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-2xl">

                            </div>

                            <div>

                                <h3 class="font-bold text-gray-800">

                                    {{ $alat->nama_alat }}

                                </h3>

                                <p class="text-sm text-gray-500">

                                    {{ $alat->kategori }}

                                </p>

                            </div>

                        </div>

                        {{-- Status --}}
                        <div class="text-right">

                            @if($alat->jumlah_tersedia==0)

                            <span class="inline-block px-4 py-1 rounded-full bg-red-100 text-red-600 font-semibold">

                                Habis

                            </span>

                            @elseif($alat->jumlah_tersedia==1)

                            <span class="inline-block px-4 py-1 rounded-full bg-red-100 text-red-600 font-semibold">

                                1 Unit

                            </span>

                            @elseif($alat->jumlah_tersedia==2)

                            <span class="inline-block px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                                2 Unit

                            </span>

                            @else

                            <span class="inline-block px-4 py-1 rounded-full bg-orange-100 text-orange-700 font-semibold">

                                {{ $alat->jumlah_tersedia }} Unit

                            </span>

                            @endif

                            {{-- Progress --}}
                            <div class="mt-3 w-44 h-2 bg-gray-200 rounded-full overflow-hidden">

                                <div
                                    class="
                            @if($alat->jumlah_tersedia==0)
                                bg-red-500
                            @elseif($alat->jumlah_tersedia<=2)
                                bg-yellow-500
                            @else
                                bg-orange-500
                            @endif
                            h-2 rounded-full"
                                    style="width: {{ ($alat->jumlah_tersedia/3)*100 }}%">
                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="py-12 text-center">

                        <div class="text-6xl mb-3">
                            ✅
                        </div>

                        <h3 class="text-xl font-bold text-green-600">

                            Semua Alat Masih Aman

                        </h3>

                        <p class="text-gray-500 mt-2">

                            Tidak ada alat yang memiliki stok kurang dari atau sama dengan 3 unit.

                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

            {{-- Aktivitas Terbaru --}}
            <div class="bg-white rounded-xl shadow mt-8 p-6">

                <h2 class="text-xl font-bold mb-5">
                    Aktivitas Terbaru
                </h2>

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left py-3">Menu</th>
                            <th class="text-left py-3">Status</th>
                            <th class="text-left py-3">Keterangan</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="border-b">

                            <td class="py-4">
                                Dashboard
                            </td>

                            <td class="text-green-600 font-semibold">
                                Aktif
                            </td>

                            <td>
                                Sistem berjalan dengan baik.
                            </td>

                        </tr>

                        <tr class="border-b">

                            <td class="py-4">
                                Peminjaman
                            </td>

                            <td class="text-blue-600 font-semibold">
                                {{ $jumlahPeminjaman }} Data
                            </td>

                            <td>
                                Total peminjaman yang tersimpan.
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</x-app-layout>