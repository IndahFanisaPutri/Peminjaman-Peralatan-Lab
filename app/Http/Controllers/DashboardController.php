<?php

namespace App\Http\Controllers;

use App\Models\AlatLaboratorium;
use App\Models\PeminjamanAlat;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahAlat = AlatLaboratorium::count();
        $totalStok = AlatLaboratorium::sum('jumlah');
        $alatTersedia = AlatLaboratorium::sum('jumlah_tersedia');
        $jumlahPeminjaman = PeminjamanAlat::count();
        $sedangDipinjam = PeminjamanAlat::where(
            'status',
            'disetujui'
        )->count();

        $alatTerpopuler = PeminjamanAlat::selectRaw(
            'alat_id, count(*) as jumlah_pinjam'
        )
        ->groupBy('alat_id')
        ->orderByDesc('jumlah_pinjam')
        ->with('alat')
        ->first();

        return view('dashboard.index',[
            'jumlahAlat'=>$jumlahAlat,
            'totalStok'=>$totalStok,
            'alatTersedia'=>$alatTersedia,
            'jumlahPeminjaman'=>$jumlahPeminjaman,
            'sedangDipinjam'=>$sedangDipinjam,
            'alatTerpopuler'=>$alatTerpopuler
        ]);
    }
}