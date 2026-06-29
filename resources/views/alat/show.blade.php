@extends('layouts.template')
@section('content')

<h2>Detail Alat Laboratorium</h2>
<hr>
<!-- FOTO ALAT -->

<div>
    <h3>
        Foto Kondisi Alat
    </h3>

    @if($alat->foto)
        <img
            src="{{ asset('storage/'.$alat->foto) }}"
            width="300"
            height="300"
            style="object-fit:cover;border-radius:10px;">
    @else
        <p>
            Belum ada foto alat
        </p>
    @endif
</div>

<br>

<!-- INFORMASI ALAT -->
<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <td>
        <b>Kode Alat</b>
    </td>

    <td>
        {{ $alat->kode_alat }}
    </td>
</tr>

<tr>
    <td>
        <b>Nama Alat</b>
    </td>

    <td>
        {{ $alat->nama_alat }}
    </td>
</tr>

<tr>
    <td>
        <b>Kategori</b>
    </td>

    <td>
        {{ $alat->kategori }}
    </td>
</tr>

<tr>
    <td>
        <b>Merk</b>
    </td>

    <td>
        {{ $alat->merk }}
    </td>
</tr>

<tr>
    <td>
        <b>Model</b>
    </td>

    <td>
        {{ $alat->model }}
    </td>
</tr>


<tr>

    <td>
        <b>Kondisi Alat</b>
    </td>

    <td>
        @if($alat->kondisi == 'baik')
            <span>
                Baik
            </span>
        @elseif($alat->kondisi == 'rusak')
            <span>
                Rusak
            </span>
        @else
            <span>
                Perlu Perbaikan
            </span>
        @endif
    </td>
</tr>

<tr>
    <td>
        <b>Jumlah</b>
    </td>
    <td>
        {{ $alat->jumlah }}
    </td>
</tr>

<tr>
    <td>
        <b>Jumlah Tersedia</b>
    </td>

    <td>
        {{ $alat->jumlah_tersedia }}
    </td>
</tr>

<tr>
    <td>
    <b>Lokasi Penyimpanan</b>
    </td>

    <td>
    {{ $alat->lokasi }}
    </td>
</tr>

<tr>
    <td>
        <b>Deskripsi</b>
    </td>
    
    <td>
    @if($alat->deskripsi)
    {{ $alat->deskripsi }}
    @else
    Tidak ada deskripsi
    @endif
    </td>
</tr>
</table>
<br>

<a href="{{ route('alat.index') }}">
    ← Kembali
</a>

@endsection