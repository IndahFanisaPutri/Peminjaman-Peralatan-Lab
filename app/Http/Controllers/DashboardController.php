<?php

namespace App\Http\Controllers;

use App\Models\AlatLaboratorium;
use App\Models\PeminjamanAlat;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Dashboard User
        if(Auth::user()->role == 'user')
        {
            $jumlahAlat = \App\Models\AlatLaboratorium::count();

            $alatTersedia = \App\Models\AlatLaboratorium::sum('jumlah_tersedia');
            
            $jumlahPeminjaman = PeminjamanAlat::where('user_id', Auth::id())->count();

            $sedangDipinjam = PeminjamanAlat::where('user_id', Auth::id())
                                ->where('status', 'disetujui')
                                ->count();

            $selesai = PeminjamanAlat::where('user_id', Auth::id())
                            ->where('status', 'dikembalikan')
                            ->count();

            return view('dashboard-user', compact(
                'jumlahAlat',
                'alatTersedia',
                'jumlahPeminjaman',
                'sedangDipinjam',
                'selesai'
            ));
        }

        // Dashboard Admin
        $jumlahAlat = AlatLaboratorium::count();

        $totalStok = AlatLaboratorium::sum('jumlah');

        $alatTersedia = AlatLaboratorium::sum('jumlah_tersedia');

        $jumlahPeminjaman = PeminjamanAlat::count();

        $sedangDipinjam = PeminjamanAlat::where('status','disetujui')->count();

        $alatTerpopuler = PeminjamanAlat::selectRaw(
                'alat_id, COUNT(*) as jumlah_pinjam'
            )
            ->groupBy('alat_id')
            ->with('alat')
            ->orderByDesc('jumlah_pinjam')
            ->first();

        return view('dashboard', compact(
            'jumlahAlat',
            'totalStok',
            'alatTersedia',
            'jumlahPeminjaman',
            'sedangDipinjam',
            'alatTerpopuler'
        ));
    }
}