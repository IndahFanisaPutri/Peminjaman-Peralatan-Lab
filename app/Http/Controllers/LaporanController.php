<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanAlat;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = PeminjamanAlat::with('alat')
                    ->latest()
                    ->get();

        return view('laporan.index', [

            'laporan' => $laporan,

            'totalPeminjaman' => $laporan->count(),

            'disetujui' => $laporan->where('status','disetujui')->count(),

            'dikembalikan' => $laporan->where('status','dikembalikan')->count(),

            'ditolak' => $laporan->where('status','ditolak')->count(),

            'menunggu' => $laporan->where('status','menunggu')->count(),

        ]);
    }
}