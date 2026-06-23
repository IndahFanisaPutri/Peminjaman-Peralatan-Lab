<h1>
Dashboard Sistem Peminjaman Laboratorium
</h1>

<table border="1" cellpadding="10">
    <tr>
        <td>Jumlah Jenis Alat</td>
        <td>{{ $jumlahAlat }}</td>
    </tr>

    <tr>
        <td>Total Stok Alat</td>
        <td>{{ $totalStok }}</td>
    </tr>

    <tr>
        <td>Alat Tersedia</td>
        <td>{{ $alatTersedia }}</td>
    </tr>

    <tr>
        <td>Total Peminjaman</td>
        <td>{{ $jumlahPeminjaman }}</td>
    </tr>

    <tr>
        <td>Sedang Dipinjam</td>
        <td>{{ $sedangDipinjam }}</td>
    </tr>
</table>



<h3>
Alat Paling Sering Dipinjam
</h3>

@if($alatTerpopuler)
    <p>Nama Alat :{{ $alatTerpopuler->alat->nama_alat }}</p>
    <p>Jumlah Dipinjam :{{ $alatTerpopuler->jumlah_pinjam }}kali</p>
@else
    <p>Belum ada data peminjaman</p>
@endif

<br>

<a href="{{ route('alat.index') }}">Data Alat</a>

<a href="{{ route('peminjaman.index') }}">Peminjaman</a>