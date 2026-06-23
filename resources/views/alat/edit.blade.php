<h2>Edit Alat Laboratorium</h2>

<form action="{{ route('alat.update', $alat->id) }}" method="POST">
@csrf
@method('PUT')

Kode:
<input type="text" name="kode_alat" value="{{ $alat->kode_alat }}"><br>

Nama:
<input type="text" name="nama_alat" value="{{ $alat->nama_alat }}"><br>

Kategori:
<input type="text" name="kategori" value="{{ $alat->kategori }}"><br>

Merk:
<input type="text" name="merk" value="{{ $alat->merk }}"><br>

Model:
<input type="text" name="model" value="{{ $alat->model }}"><br>

Jumlah:
<input type="number" name="jumlah" value="{{ $alat->jumlah }}"><br>

Lokasi:
<input type="text" name="lokasi" value="{{ $alat->lokasi }}"><br>

<button type="submit">Update</button>

</form>