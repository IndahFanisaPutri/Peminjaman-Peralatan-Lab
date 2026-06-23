<h2>Detail Alat Laboratorium</h2>

<p><b>Kode:</b> {{ $alat->kode_alat }}</p>
<p><b>Nama:</b> {{ $alat->nama_alat }}</p>
<p><b>Kategori:</b> {{ $alat->kategori }}</p>
<p><b>Merk:</b> {{ $alat->merk }}</p>
<p><b>Model:</b> {{ $alat->model }}</p>
<p><b>Kondisi:</b> {{ $alat->kondisi }}</p>
<p><b>Jumlah:</b> {{ $alat->jumlah }}</p>
<p><b>Tersedia:</b> {{ $alat->jumlah_tersedia }}</p>
<p><b>Lokasi:</b> {{ $alat->lokasi }}</p>

<a href="{{ route('alat.index') }}">Kembali</a>
