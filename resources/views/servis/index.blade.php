@extends('layouts.template')
@section('content')

<h2>Jadwal Servis Alat</h2>

<a href="{{ route('servis.create') }}">
+ Tambah Servis
</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Alat</th>
        <th>Tanggal</th>
        <th>Kerusakan</th>
        <th>Status</th>
    </tr>

    @foreach($servis as $item)

        <tr>
            <td>
                {{ $item->alat->nama_alat }}
            </td>

            <td>
                {{ $item->tanggal_servis }}
            </td>

            <td>
                {{ $item->kerusakan }}
            </td>

            <td>
                {{ $item->status }}
            </td>
        </tr>
    @endforeach
</table>
@endsection