<h2>Tambah Alat Laboratorium</h2>

<form 
action="{{ route('alat.store') }}" 
method="POST"
enctype="multipart/form-data">
@csrf

Kode Alat:
<input type="text" name="kode_alat"><br>

Nama Alat:
<input type="text" name="nama_alat"><br>

Kategori:
<input type="text" name="kategori"><br>

Merk:
<input type="text" name="merk"><br>

Model:
<input type="text" name="model"><br>

Jumlah:
<input type="number" name="jumlah"><br>

Lokasi:
<input type="text" name="lokasi"><br>

Deskripsi:
<textarea name="deskripsi"></textarea><br>

Foto Alat:
<label>Foto Alat</label>
<input type="file" name="foto"><br><br>

<button type="submit">Simpan</button>

</form>