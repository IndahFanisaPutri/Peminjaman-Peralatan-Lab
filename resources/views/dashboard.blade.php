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
            Selamat datang kembali,
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
                    d="M19 9l-7 7-7-7"/>

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


            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition">

                👤

                <span>Edit Profil</span>

            </a>


            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full text-left flex items-center gap-3 px-4 py-3 hover:bg-red-50 text-red-600 transition">

                    🚪

                    <span>Logout</span>

                </button>

            </form>

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