<x-app-layout>

<div class="min-h-screen bg-gray-100">

    {{-- Sidebar Admin --}}
    @include('layouts.admin-sidebar')

    {{-- Content --}}
    <main class="ml-64 p-8">

        {{-- Header --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

            <h1 class="text-2xl font-bold text-gray-700">
                Tambah Jadwal Servis
            </h1>

            <p class="text-gray-400 mt-2">
                Tambahkan data jadwal servis alat laboratorium.
            </p>

        </div>

        {{-- Error --}}
        @if ($errors->any())

            <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-5">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow p-8">

            <form action="{{ route('servis.store') }}" method="POST">

                @csrf

                {{-- Nama Alat --}}
                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">
                        Pilih Alat
                    </label>

                    <select
                        name="alat_id"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                        <option value="">-- Pilih Alat --</option>

                        @foreach($alat as $a)

                            <option value="{{ $a->id }}">

                                {{ $a->nama_alat }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Tanggal --}}
                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">
                        Tanggal Servis
                    </label>

                    <input
                        type="date"
                        name="tanggal_service"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                </div>

                {{-- Teknisi --}}
                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">
                        Nama Teknisi
                    </label>

                    <input
                        type="text"
                        name="teknisi"
                        placeholder="Masukkan nama teknisi"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                </div>

                {{-- Kerusakan --}}
                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">
                        Kerusakan
                    </label>

                    <textarea
                        name="kerusakan"
                        rows="4"
                        placeholder="Masukkan deskripsi kerusakan"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"></textarea>

                </div>

                {{-- Tindakan --}}
                <div class="mb-8">

                    <label class="block mb-2 font-semibold text-gray-700">
                        Tindakan Perbaikan
                    </label>

                    <textarea
                        name="tindakan"
                        rows="4"
                        placeholder="Masukkan tindakan yang dilakukan"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"></textarea>

                </div>

                {{-- Tombol --}}
                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">

                        Simpan

                    </button>

                    <a
                        href="{{ route('servis.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-lg transition">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

</x-app-layout>