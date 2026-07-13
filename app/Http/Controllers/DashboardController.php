<?php

namespace App\Http\Controllers;

use App\Models\AlatLaboratorium;
use App\Models\PeminjamanAlat;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jumlahAlat = AlatLaboratorium::count();

        $totalStok = AlatLaboratorium::sum('jumlah');

        $alatTersedia = AlatLaboratorium::sum('jumlah_tersedia');

        $jumlahPeminjaman = PeminjamanAlat::count();

        if ($user->role == 'user') {

            return view('dashboard-user', [
                'jumlahAlat' => $jumlahAlat,
                'alatTersedia' => $alatTersedia,
            ]);
        }

        return view('dashboard', [
            'jumlahAlat' => $jumlahAlat,
            'totalStok' => $totalStok,
            'alatTersedia' => $alatTersedia,
            'jumlahPeminjaman' => $jumlahPeminjaman,
        ]);
    }
}