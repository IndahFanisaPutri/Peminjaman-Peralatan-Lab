<x-app-layout>

<div class="min-h-screen bg-gray-100 flex items-center justify-center">

 @include('layouts.user-sidebar')
    <div class="bg-white shadow-xl rounded-3xl p-10 w-full max-w-3xl">

        <h1 class="text-3xl font-bold text-indigo-600">
            Selamat Datang,
            {{ auth()->user()->name }}
        </h1>

        <p class="mt-4 text-gray-500">
            Silakan melakukan peminjaman peralatan laboratorium.
        </p>

        <div class="grid grid-cols-2 gap-6 mt-8">

            <div class="bg-indigo-50 rounded-xl p-6">

                <h2 class="text-gray-500">
                    Jumlah Alat
                </h2>

                <div class="text-4xl font-bold mt-2">

                    {{ $jumlahAlat }}

                </div>

            </div>

            <div class="bg-green-50 rounded-xl p-6">

                <h2 class="text-gray-500">
                    Alat Tersedia
                </h2>

                <div class="text-4xl font-bold mt-2 text-green-600">

                    {{ $alatTersedia }}

                </div>

            </div>

        </div>

        <div class="mt-10">

            <a
                href="{{ route('peminjaman.index') }}"
                class="inline-block px-8 py-4 bg-indigo-600 text-white rounded-xl font-bold">

                Mulai Peminjaman

            </a>

        </div>

    </div>

</div>

</x-app-layout>