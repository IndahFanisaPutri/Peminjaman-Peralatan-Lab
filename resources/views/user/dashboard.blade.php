<x-app-layout>

<div class="min-h-screen bg-gray-100">

    <main class="max-w-6xl mx-auto py-10 px-5">

        <!-- HEADER -->

        <div class="bg-white rounded-2xl shadow-sm p-8">

            <h1 class="text-3xl font-bold text-indigo-600">
                Selamat Datang, {{ auth()->user()->name }} 👋
            </h1>

            <p class="text-gray-500 mt-3">

                Selamat datang di Sistem Informasi Peminjaman
                Peralatan Laboratorium.

                Silakan melakukan peminjaman alat sesuai kebutuhan.

            </p>

            <a href="{{ route('peminjaman.create') }}"
                class="inline-block mt-6 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                📦 Mulai Meminjam

            </a>

        </div>





        <!-- MENU -->

        <div class="grid md:grid-cols-2 gap-6 mt-8">

            <a href="{{ route('peminjaman.index') }}">

                <div class="bg-white rounded-2xl shadow p-8 hover:shadow-lg">

                    <h2 class="text-xl font-bold text-indigo-600">

                        Riwayat Peminjaman

                    </h2>

                    <p class="text-gray-500 mt-2">

                        Lihat semua peminjaman yang pernah Anda lakukan.

                    </p>

                </div>

            </a>





            <a href="{{ route('profile.edit') }}">

                <div class="bg-white rounded-2xl shadow p-8 hover:shadow-lg">

                    <h2 class="text-xl font-bold text-green-600">

                        Profil

                    </h2>

                    <p class="text-gray-500 mt-2">

                        Edit profil akun Anda.

                    </p>

                </div>

            </a>

        </div>

    </main>

</div>

</x-app-layout>