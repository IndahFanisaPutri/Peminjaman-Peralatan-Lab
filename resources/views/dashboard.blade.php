<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Sidebar Admin --}}
    @include('layouts.admin-sidebar')

    {{-- Content --}}
    <main class="ml-64 p-6">

        {{-- Topbar --}}
        <div class="bg-white rounded-xl shadow-sm px-6 py-4 flex justify-between items-center mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-700">
                    Dashboard Admin
                </h1>

                <p class="text-gray-500">
                    Selamat datang, {{ auth()->user()->name }}
                </p>
            </div>

            <div class="flex items-center gap-4">

                <button class="relative">

                    🔔

                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>

                </button>

                <div class="w-10 h-10 rounded-full bg-indigo-500 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

            </div>

        </div>

        {{-- Welcome --}}
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white shadow">

            <h2 class="text-3xl font-bold">
                Selamat Datang Admin 👋
            </h2>

            <p class="mt-3 opacity-90">
                Kelola seluruh peminjaman laboratorium melalui dashboard ini.
            </p>

        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Jumlah Alat
                </p>

                <h1 class="text-4xl font-bold text-indigo-600 mt-2">
                    {{ $jumlahAlat }}
                </h1>

            </div>

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Total Stok
                </p>

                <h1 class="text-4xl font-bold text-blue-600 mt-2">
                    {{ $totalStok }}
                </h1>

            </div>

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Alat Tersedia
                </p>

                <h1 class="text-4xl font-bold text-green-600 mt-2">
                    {{ $alatTersedia }}
                </h1>

            </div>

            <div class="bg-white rounded-xl shadow p-6">

                <p class="text-gray-500">
                    Total Peminjaman
                </p>

                <h1 class="text-4xl font-bold text-orange-500 mt-2">
                    {{ $jumlahPeminjaman }}
                </h1>

            </div>

        </div>

        {{-- Menu Cepat --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

            <a href="{{ route('alat.index') }}"
               class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition">

                <div class="text-5xl">
                    ⚙️
                </div>

                <h2 class="font-bold text-xl mt-4">
                    Kelola Alat
                </h2>

                <p class="text-gray-500 mt-2">
                    Tambah, ubah, dan hapus data alat.
                </p>

            </a>

            <a href="{{ route('peminjaman.index') }}"
               class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition">

                <div class="text-5xl">
                    📦
                </div>

                <h2 class="font-bold text-xl mt-4">
                    Peminjaman
                </h2>

                <p class="text-gray-500 mt-2">
                    Kelola seluruh data peminjaman.
                </p>

            </a>

            <a href="{{ route('servis.index') }}"
               class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition">

                <div class="text-5xl">
                    🛠️
                </div>

                <h2 class="font-bold text-xl mt-4">
                    Servis
                </h2>

                <p class="text-gray-500 mt-2">
                    Kelola data servis peralatan.
                </p>

            </a>

            <a href="{{ route('laporan.index') }}"
               class="bg-white rounded-xl shadow p-6 hover:shadow-xl transition">

                <div class="text-5xl">
                    📊
                </div>

                <h2 class="font-bold text-xl mt-4">
                    Laporan
                </h2>

                <p class="text-gray-500 mt-2">
                    Lihat laporan peminjaman.
                </p>

            </a>

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