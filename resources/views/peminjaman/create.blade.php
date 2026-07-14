<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Navbar User --}}
    @include('layouts.user-navbar')

    <main class="max-w-5xl mx-auto px-6 py-8">

        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow p-8 mb-6">

            <h1 class="text-3xl font-bold text-indigo-600">
                Ajukan Peminjaman
            </h1>

            <p class="text-gray-500 mt-2">
                Lengkapi data berikut untuk melakukan peminjaman peralatan laboratorium.
            </p>

        </div>


        {{-- Pesan Berhasil --}}
        @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">
                {{ session('success') }}
            </div>

        @endif


        {{-- Form --}}
        <div class="bg-white rounded-2xl shadow p-8">

            <form action="{{ route('peminjaman.store') }}" method="POST">

                @csrf

                <div class="grid md:grid-cols-2 gap-6">

                    {{-- Pilih Alat --}}
                    <div>

                        <label class="font-semibold">
                            Pilih Alat
                        </label>

                        <select
                            name="alat_id"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500">

                            <option value="">
                                -- Pilih Alat --
                            </option>

                            @foreach($alat as $item)

                                <option value="{{ $item->id }}">

                                    {{ $item->nama_alat }}
                                    (Tersedia : {{ $item->jumlah_tersedia }})

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Nama --}}
                    <div>

                        <label class="font-semibold">
                            Nama Peminjam
                        </label>

                        <input
                            type="text"
                            value="{{ auth()->user()->name }}"
                            readonly
                            class="w-full mt-2 border rounded-xl p-3 bg-gray-100">

                    </div>

                    {{-- NIM --}}
                    <div>

                        <label class="font-semibold">
                            NIM
                        </label>

                        <input
                            type="text"
                            name="nim_peminjam"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500">

                    </div>

                    {{-- Jumlah --}}
                    <div>

                        <label class="font-semibold">
                            Jumlah Pinjam
                        </label>

                        <input
                            type="number"
                            name="jumlah_pinjam"
                            min="1"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500">

                    </div>

                    {{-- Tanggal Pinjam --}}
                    <div>

                        <label class="font-semibold">
                            Tanggal Pinjam
                        </label>

                        <input
                            type="date"
                            name="tanggal_pinjam"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500">

                    </div>

                    {{-- Tanggal Kembali --}}
                    <div>

                        <label class="font-semibold">
                            Rencana Pengembalian
                        </label>

                        <input
                            type="date"
                            name="tanggal_rencana_kembali"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500">

                    </div>

                </div>


                {{-- Keperluan --}}
                <div class="mt-6">

                    <label class="font-semibold">
                        Keperluan
                    </label>

                    <textarea
                        name="keperluan"
                        rows="5"
                        class="w-full mt-2 border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500"
                        placeholder="Tuliskan keperluan peminjaman..."></textarea>

                </div>


                {{-- Tombol --}}
                <div class="flex gap-4 mt-8">

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-semibold transition">

                        Simpan Peminjaman

                    </button>

                    <a
                        href="{{ route('peminjaman.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 px-8 py-3 rounded-xl font-semibold transition">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

</x-app-layout>