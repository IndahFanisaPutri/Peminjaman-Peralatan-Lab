@extends('layouts.template')
@section('content')

<h2>Laporan Utilitas Alat Laboratorium</h2>


<br>

<div>
<table border="1" cellpadding="10">

<tr>

<td>Jumlah Jenis Alat</td>

<td>
{{ $jumlahAlat }}
</td>

</tr>

<tr>

<td>
Total Peminjaman
</td>

<td>
{{ $jumlahPeminjaman }}
</td>

</tr>

</table>

</div>

<br><br>

<h3>
Statistik Penggunaan Alat
</h3>

<table border="1" cellpadding="10">

<tr>

<th>
No
</th>

<th>
Nama Alat
</th>

<th>
Jumlah Dipinjam
</th>

</tr>

@foreach($alatTerpopuler as $index=>$data)

<tr>

<td>
{{ $index+1 }}
</td>

<td>
{{ $data->alat->nama_alat }}
</td>


<td>
{{ $data->total_pinjam }}
Kali
</td>

</tr>

@endforeach

</table>
@endsection