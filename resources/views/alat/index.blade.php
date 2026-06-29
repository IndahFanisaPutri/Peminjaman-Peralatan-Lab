@extends('layouts.template')
@section('content')

<h2>Data Alat Laboratorium</h2>
<a href="{{ route('alat.create') }}">
    + Tambah Alat
</a>

@if(session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No</th>
    <th>Foto</th>
    <th>Kode Alat</th>
    <th>Nama Alat</th>
    <th>Kategori</th>
    <th>Kondisi</th>
    <th>Jumlah</th>
    <th>Tersedia</th>
    <th>Aksi</th>
</tr>

@foreach($alat as $index => $item)
<tr>
    <td>
        {{ $index + 1 }}
    </td>

    <!-- FOTO ALAT -->
    <td>
        @if($item->foto)
            <img
            src="{{ asset('storage/'.$item->foto) }}"
            width="100"
            height="100"
            style="object-fit:cover;">
        @else
            <span>
                Tidak ada foto
            </span>
        @endif
    </td>

    <!-- DATA ALAT -->
    <td>
        {{ $item->kode_alat }}
    </td>

    <td>
        {{ $item->nama_alat }}
    </td>

    <td>
        {{ $item->kategori }}
    </td>

    <td>
        @if($item->kondisi == 'baik')
            Baik
        @elseif($item->kondisi == 'rusak')
            Rusak
        @else
            Perlu Perbaikan
        @endif
    </td>

    <td>
        {{ $item->jumlah }}
    </td>

    <td>
        {{ $item->jumlah_tersedia }}
    </td>

    <!-- AKSI -->
    <td>
        <a href="{{ route('alat.show',$item->id) }}">
            Detail
        </a>

        <a href="{{ route('alat.edit',$item->id) }}">
            Edit
        </a>

        <form
        action="{{ route('alat.destroy',$item->id) }}"
        method="POST"
        style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
            onclick="return confirm('Hapus data alat?')">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection