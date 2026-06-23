<h2>Form Peminjaman Alat</h2>

<form action="{{ route('peminjaman.store') }}" method="POST">
@csrf

Nama Peminjam:
<input type="text" name="nama_peminjam"><br>

NIM:
<input type="text" name="nim_peminjam"><br>

Fakultas:
<input type="text" name="fakultas"><br>

Pilih Alat:
<select name="alat_id">
    @foreach($alat as $a)
        <option value="{{ $a->id }}">{{ $a->nama_alat }}</option>
    @endforeach
</select><br>

Jumlah Pinjam:
<input type="number" name="jumlah_pinjam"><br>

Keperluan:
<textarea name="keperluan"></textarea><br>

Tanggal Pinjam:
<input type="date" name="tanggal_pinjam"><br>

Tanggal Kembali:
<input type="date" name="tanggal_rencana_kembali"><br>

<button type="submit">Ajukan</button>

</form>