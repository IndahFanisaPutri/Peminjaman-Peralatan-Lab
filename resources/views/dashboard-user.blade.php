<x-app-layout>

    {{-- Navbar --}}
    @include('layouts.user-navbar')

    <div class="bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto py-10 px-8">

            <div class="bg-white rounded-3xl shadow-lg p-10">

                <h1 class="text-4xl font-bold text-indigo-600">
                    Selamat Datang,
                    {{ auth()->user()->name }} 👋
                </h1>

                <p class="text-gray-500 mt-3 text-lg">
                    Selamat datang di Sistem Peminjaman Peralatan Laboratorium.
                    Silakan melakukan peminjaman alat sesuai kebutuhan.
                </p>

                <a href="{{ route('peminjaman.index') }}"
                    class="inline-block mt-8 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-xl font-semibold">

                    📦 Mulai Meminjam

                </a>

            </div>

            <div class="grid md:grid-cols-2 gap-8 mt-8">

                <div class="bg-white rounded-3xl shadow p-8">

                    <h2 class="text-gray-500 text-lg">
                        Jumlah Alat
                    </h2>

                    <div class="text-5xl font-bold text-indigo-600 mt-4">

                        {{ $jumlahAlat }}

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow p-8">

                    <h2 class="text-gray-500 text-lg">
                        Alat Tersedia
                    </h2>

                    <div class="text-5xl font-bold text-green-500 mt-4">

                        {{ $alatTersedia }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>