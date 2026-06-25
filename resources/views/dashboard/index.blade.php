@extends('layouts.template')
@section('content')

    <h2>Dashboard Admin</h2>

    <div class="card">
        <h3>{{ $jumlahAlat }}</h3>
        <p>Jenis Alat</p>
    </div>


    <div class="card">
        <h3>{{ $totalStok }}</h3>
        <p>Total Stok</p>
    </div>


    <div class="card">
        <h3>{{ $alatTersedia }}</h3>
        <p>Alat Tersedia</p>
    </div>


    <div class="card">
        <h3>{{ $jumlahPeminjaman }}</h3>
        <p>Total Peminjaman</p>
    </div>


    <div class="card">
        <h3>{{ $sedangDipinjam }}</h3>
        <p>Sedang Dipinjam</p>
    </div>


    <h3>Alat Terpopuler</h3>

    @if($alatTerpopuler)
        <p>
            {{ $alatTerpopuler->alat->nama_alat }}
            dipinjam
            {{ $alatTerpopuler->jumlah_pinjam }}
            kali
        </p>
    @else
        <p>Belum ada peminjaman</p>
    @endif
@endsection