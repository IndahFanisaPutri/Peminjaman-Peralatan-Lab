<h2>Data Peminjaman Alat</h2>

<a href="{{ route('peminjaman.create') }}">+ Ajukan Peminjaman</a>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Alat</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($peminjaman as $item)
    <tr>
        <td>{{ $item->nama_peminjam }}</td>
        <td>{{ $item->nim_peminjam }}</td>
        <td>{{ $item->alat->nama_alat }}</td>
        <td>{{ $item->jumlah_pinjam }}</td>
        <td>{{ $item->status }}</td>

        <td>

        @if($item->status == 'menunggu')

            <a href="{{ route('peminjaman.setujui', $item->id) }}">
                Setujui
            </a>

            |

            <a href="{{ route('peminjaman.tolak', $item->id) }}">
                Tolak
            </a>

        @else

            Tidak ada aksi

        @endif

    </td>
    
    </tr>
    @endforeach
</table>