<x-app-layout>

    {{-- Navbar --}}
    @include('layouts.user-navbar')

    <div class="bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto py-10 px-8">

            <div class="bg-white rounded-3xl shadow-lg p-10">

                <h1 class="text-4xl font-bold text-indigo-600">
                    Selamat Datang,
                    {{ auth()->user()->name }} 
                </h1>

                <p class="text-gray-500 mt-3 text-lg">
                    Selamat datang di Sistem InformasiPeminjaman Peralatan Laboratorium.
                    Silakan melakukan peminjaman alat sesuai kebutuhan.
                </p>

                <a href="{{ route('peminjaman.index') }}"
                    class="inline-block mt-8 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-xl font-semibold">

                    Mulai Meminjam

                </a>

            </div>
            {{-- Pengingat Pengembalian --}}

@if($pengingatPengembalian)

@php

$sisaHari = now()->diffInDays(
    $pengingatPengembalian->tanggal_rencana_kembali,
    false
);

@endphp

<div class="bg-white rounded-3xl shadow-lg mt-8 p-8">

    <div class="flex justify-between items-center">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                🔔 Pengingat Pengembalian

            </h2>

            <p class="text-gray-500 mt-1">

                Segera lakukan pengembalian sebelum batas waktu.

            </p>

        </div>

        @php
$sisaHari = \Carbon\Carbon::now()->startOfDay()->diffInDays(
    \Carbon\Carbon::parse($pengingatPengembalian->tanggal_rencana_kembali)->startOfDay(),
    false
);
@endphp
        @if($sisaHari < 0)

            <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full font-semibold">

                Terlambat {{ abs($sisaHari) }} Hari

            </span>

        @elseif($sisaHari == 0)

            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">

                Hari Ini

            </span>

        @else

            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">

                {{ $sisaHari }} Hari Lagi

            </span>

        @endif

    </div>

    <div class="grid md:grid-cols-2 gap-6 mt-8">

        <div>

            <p class="text-gray-500">

                Nama Alat

            </p>

            <h3 class="text-xl font-bold text-indigo-600 mt-1">

                {{ $pengingatPengembalian->alat->nama_alat }}

            </h3>

        </div>

        <div>

            <p class="text-gray-500">

                Jumlah Dipinjam

            </p>

            <h3 class="text-xl font-bold mt-1">

                {{ $pengingatPengembalian->jumlah_pinjam }} Unit

            </h3>

        </div>

        <div>

            <p class="text-gray-500">

                Tanggal Pinjam

            </p>

            <h3 class="font-semibold mt-1">

                {{ \Carbon\Carbon::parse($pengingatPengembalian->tanggal_pinjam)->format('d M Y') }}

            </h3>

        </div>

        <div>

            <p class="text-gray-500">

                Batas Pengembalian

            </p>

            <h3 class="font-semibold mt-1">

                {{ \Carbon\Carbon::parse($pengingatPengembalian->tanggal_rencana_kembali)->format('d M Y') }}

            </h3>

        </div>

    </div>

    <div class="mt-8">

        <a href="{{ route('pengembalian.index') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

            Ajukan Pengembalian

        </a>

    </div>

</div>

@endif
            

        </div>

    </div>

</x-app-layout>