<h2>Detail Alat Laboratorium</h2>

@if($alat->foto)
    <p>
        <b>Foto Alat:</b>
    </p>

    <img 
    src="{{ asset('storage/'.$alat->foto) }}"
    width="250"
    height="250">
@else
    <p>
        Tidak ada foto alat
    </p>
@endif

<br><br>

<p>
    <b>Kode:</b> 
    {{ $alat->kode_alat }}
</p>

<p>
    <b>Nama:</b> 
    {{ $alat->nama_alat }}
</p>

<p>
    <b>Kategori:</b> 
    {{ $alat->kategori }}
</p>

<p>
    <b>Merk:</b> 
    {{ $alat->merk }}
</p>

<p>
    <b>Model:</b> 
    {{ $alat->model }}
</p>

<p>
    <b>Kondisi:</b> 
    {{ $alat->kondisi }}
</p>

<p>
    <b>Jumlah:</b> 
    {{ $alat->jumlah }}
</p>

<p>
    <b>Jumlah Tersedia:</b> 
    {{ $alat->jumlah_tersedia }}
</p>

<p>
    <b>Lokasi:</b> 
    {{ $alat->lokasi }}
</p>

<p>
    <b>Deskripsi:</b>
</p>

<p>
    {{ $alat->deskripsi }}
</p>

<a href="{{ route('alat.index') }}">
    Kembali
</a>