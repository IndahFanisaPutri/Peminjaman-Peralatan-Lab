<h2>Data Alat Laboratorium</h2>

<a href="{{ route('alat.create') }}">
    + Tambah Alat
</a>

@if(session('success'))
<p>
    {{ session('success') }}
</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Jumlah</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>


    @foreach($alat as $item)
    <tr>
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
            {{ $item->jumlah }}
        </td>

        //foto alat
        <td>
            @if($item->foto)
                <img 
                src="{{ asset('storage/'.$item->foto) }}"
                width="100"
                height="100">
            @else
                Tidak ada foto
            @endif
        </td>

        <td>
            <a href="{{ route('alat.show', $item->id) }}">
                Detail
            </a>

            <a href="{{ route('alat.edit', $item->id) }}">
                Edit
            </a>

            <form 
            action="{{ route('alat.destroy', $item->id) }}" 
            method="POST" 
            style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>