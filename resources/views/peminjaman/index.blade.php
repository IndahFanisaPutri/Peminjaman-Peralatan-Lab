@extends('layouts.template')
@section('content')

    <h2>Data Peminjaman Alat</h2>

    <a href="{{ route('peminjaman.create') }}">
        + Ajukan Peminjaman
    </a>

    @if(session('success'))
    <p>
        {{ session('success') }}
    </p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alat</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Denda</th>
            <th>Aksi</th>
        </tr>

        @foreach($peminjaman as $item)

        <tr>
            <td>
                {{ $item->nama_peminjam }}
            </td>

            <td>
                {{ $item->nim_peminjam }}
            </td>

            <td>
                {{ $item->alat->nama_alat }}
            </td>

            <td>
                {{ $item->jumlah_pinjam }}
            </td>

            <td>
                {{ $item->status }}
            </td>

            <td>
                Rp {{ number_format($item->denda) }}
            </td>

            <td>
                @if($item->status == 'menunggu')
                <a href="{{ route('peminjaman.setujui',$item->id) }}">
                    Setujui
                </a>

                <a href="{{ route('peminjaman.tolak',$item->id) }}">
                    Tolak
                </a>

                @elseif($item->status == 'disetujui')

                <a href="{{ route('peminjaman.kembali',$item->id) }}">
                    Kembalikan
                </a>

                @elseif($item->status == 'dikembalikan')

                Selesai

                @else

                {{ $item->status }}

                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection