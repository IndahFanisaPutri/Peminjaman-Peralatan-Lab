<x-app-layout>

<div class="min-h-screen bg-gray-100 flex">

    <!-- ================= SIDEBAR ================= -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">

        <div class="h-20 flex items-center px-8">
            <div class="text-3xl font-bold text-indigo-600">
                S
            </div>

            <h1 class="ml-3 text-xl font-bold text-gray-700">
                SilaLab
            </h1>
        </div>

        <nav class="px-5 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-100">
                🏠 Dashboard
            </a>

            <a href="{{ route('alat.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">
                ⚙️ Data Alat
            </a>

            <a href="{{ route('peminjaman.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-100">
                📦 Peminjaman
            </a>

            @if(auth()->user()->role=='admin')
            <a href="{{ route('laporan.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-100">
                📊 Laporan
            </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl">
                    🚪 Logout
                </button>
            </form>

        </nav>

    </aside>

    <!-- ================= CONTENT ================= -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

            <h1 class="text-3xl font-bold text-gray-700">
                📋 Detail Alat Laboratorium
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi lengkap mengenai alat laboratorium.
            </p>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-xl shadow-sm p-8">

            <div class="grid md:grid-cols-2 gap-10">

                <!-- FOTO -->
                <div>

                    @if($alat->foto)

                        <img
                            src="{{ asset('storage/'.$alat->foto) }}"
                            class="w-full rounded-xl shadow border">

                    @else

                        <div class="h-72 rounded-xl bg-gray-100 flex items-center justify-center">

                            <span class="text-gray-400 text-xl">
                                Tidak ada foto
                            </span>

                        </div>

                    @endif

                </div>

                <!-- INFORMASI -->
                <div class="space-y-5">

                    <div>
                        <p class="text-gray-500">Kode Alat</p>
                        <h3 class="text-lg font-semibold">
                            {{ $alat->kode_alat }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">Nama Alat</p>
                        <h3 class="text-lg font-semibold">
                            {{ $alat->nama_alat }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">Kategori</p>
                        <h3 class="text-lg font-semibold">
                            {{ $alat->kategori }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">Merk</p>
                        <h3 class="text-lg font-semibold">
                            {{ $alat->merk }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">Model</p>
                        <h3 class="text-lg font-semibold">
                            {{ $alat->model }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">Kondisi</p>

                        @if($alat->kondisi=='baik')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">
                                Baik
                            </span>

                        @elseif($alat->kondisi=='cukup')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">
                                Cukup
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">
                                Rusak
                            </span>

                        @endif

                    </div>

                    <div>
                        <p class="text-gray-500">Jumlah</p>

                        <h3 class="text-lg font-semibold">

                            {{ $alat->jumlah }}

                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">
                            Stok Tersedia
                        </p>

                        <h3 class="text-lg font-semibold text-indigo-600">

                            {{ $alat->jumlah_tersedia }}

                        </h3>
                    </div>

                    <div>
                        <p class="text-gray-500">
                            Lokasi Penyimpanan
                        </p>

                        <h3 class="text-lg font-semibold">

                            {{ $alat->lokasi }}

                        </h3>
                    </div>

                </div>

            </div>

            <!-- DESKRIPSI -->

            <div class="mt-10">

                <h2 class="text-xl font-bold text-gray-700 mb-3">

                    Deskripsi

                </h2>

                <div class="bg-gray-50 rounded-xl p-5 text-gray-700">

                    {{ $alat->deskripsi }}

                </div>

            </div>

            <!-- BUTTON -->

            <div class="mt-10 flex gap-4">

                <a href="{{ route('alat.edit',$alat->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold">

                    ✏ Edit

                </a>

                <a href="{{ route('alat.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg font-semibold">

                    ← Kembali

                </a>

            </div>

        </div>

    </main>

</div>

</x-app-layout>