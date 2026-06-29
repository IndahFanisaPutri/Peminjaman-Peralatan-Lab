@extends('layouts.template')
@section('content')

<h2>Tambah Jadwal Servis</h2>

<form method="POST"action="{{ route('servis.store') }}">
@csrf

<select name="alat_id">
    @foreach($alat as $a)
        <option value="{{ $a->id }}">{{ $a->nama_alat }}</option>
    @endforeach
</select>

<br><br>

Tanggal Servis:
<input type="date"name="tanggal_servis">

<br><br>

Teknisi:
<input type="text"
name="teknisi">

<br><br>

Kerusakan:
<textarea name="kerusakan"></textarea>

<br><br>

Tindakan:
<textarea name="tindakan"></textarea>

<br><br>

<button>Simpan</button>

</form>

@endsection