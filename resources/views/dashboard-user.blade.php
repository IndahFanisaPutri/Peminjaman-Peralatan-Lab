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

            

        </div>

    </div>

</x-app-layout>