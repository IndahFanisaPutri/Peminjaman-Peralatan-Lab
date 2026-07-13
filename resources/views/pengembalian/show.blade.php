<x-app-layout>

<div class="min-h-screen bg-gray-100">

    @include('layouts.admin-sidebar')

    <div class="ml-64 p-8">

        <!-- Header -->
        <div class="bg-white rounded-2xl shadow p-8 mb-8">

            <h1 class="text-3xl font-bold text-indigo-600">
                Verifikasi Pengembalian
            </h1>

            <p class="text-gray-500 mt-2">
                Pastikan kondisi alat sebelum menyelesaikan proses pengembalian.
            </p>

        </div>

        @if($errors->any())

        <div class="bg-red-100 border border-red-300 text-red-700 rounded-xl p-4 mb-6">

            <ul class="list-disc ml-5">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <div class="bg-white rounded-2xl shadow p-8">

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="text-gray-500">
                        Nama Peminjam
                    </label>

                    <div class="font-semibold text-lg">

                        {{ $pengembalian->nama_peminjam }}

                    </div>

                </div>

                <div>

                    <label class="text-gray-500">
                        NIM
                    </label>

                    <div class="font-semibold text-lg">

                        {{ $pengembalian->nim_peminjam }}

                    </div>

                </div>

                <div>

                    <label class="text-gray-500">
                        Nama Alat
                    </label>

                    <div class="font-semibold text-lg">

                        {{ $pengembalian->alat->nama_alat }}

                    </div>

                </div>

                <div>

                    <label class="text-gray-500">
                        Jumlah
                    </label>

                    <div class="font-semibold text-lg">

                        {{ $pengembalian->jumlah_pinjam }}

                    </div>

                </div>

                <div>

                    <label class="text-gray-500">
                        Tanggal Pinjam
                    </label>

                    <div class="font-semibold">

                        {{ $pengembalian->tanggal_pinjam }}

                    </div>

                </div>

                <div>

                    <label class="text-gray-500">
                        Batas Pengembalian
                    </label>

                    <div class="font-semibold">

                        {{ $pengembalian->tanggal_rencana_kembali }}

                    </div>

                </div>

            </div>

            <hr class="my-8">

            <form
                action="{{ route('admin.pengembalian.update',$pengembalian->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div>

                    <label class="block font-semibold mb-3">

                        Kondisi Alat

                    </label>

                    <select
                        name="kondisi_kembali"
                        class="w-full rounded-xl border-gray-300">

                        <option value="baik">

                            Baik

                        </option>

                        <option value="cukup">

                            Cukup

                        </option>

                        <option value="rusak">

                            Rusak

                        </option>

                    </select>

                </div>

                <div class="mt-8 flex gap-4">

                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl">

                        ✔ Selesaikan Pengembalian

                    </button>

                    <a
                        href="{{ route('admin.pengembalian.index') }}"
                        class="px-6 py-3 bg-gray-200 rounded-xl">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>