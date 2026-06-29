<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanAlat;
use App\Models\AlatLaboratorium;

class LaporanController extends Controller
{
    public function index()
    {
        // total alat
        $jumlahAlat = AlatLaboratorium::count();

        // total peminjaman
        $jumlahPeminjaman = PeminjamanAlat::count();

        // alat paling sering dipinjam
        $alatTerpopuler = PeminjamanAlat::selectRaw(
            'alat_id, COUNT(*) as total_pinjam'
        )
        ->groupBy('alat_id')
        ->orderByDesc('total_pinjam')
        ->with('alat')
        ->get();


        return view('laporan.index',[
            'jumlahAlat'=>$jumlahAlat,
            'jumlahPeminjaman'=>$jumlahPeminjaman,
            'alatTerpopuler'=>$alatTerpopuler
        ]);
    }
}