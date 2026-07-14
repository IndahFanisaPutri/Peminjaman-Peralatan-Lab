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

        // Statistik lama
        $jumlahAlat = AlatLaboratorium::count();

        $totalStok = AlatLaboratorium::sum('jumlah');

        $alatTersedia = AlatLaboratorium::sum('jumlah_tersedia');

        $jumlahPeminjaman = PeminjamanAlat::count();

        // Statistik baru
        $menunggu = PeminjamanAlat::where('status', 'menunggu')->count();

        $dipinjam = PeminjamanAlat::where('status', 'disetujui')->count();

        $dikembalikan = PeminjamanAlat::where('status', 'dikembalikan')->count();

        // Alat yang stoknya hampir habis
        $alatHampirHabis = AlatLaboratorium::where('jumlah_tersedia', '<=', 3)
            ->orderBy('jumlah_tersedia')
            ->limit(5)
            ->get();

        // Pengingat Pengembalian milik user
        $pengingatPengembalian = PeminjamanAlat::with('alat')
            ->where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->orderBy('tanggal_rencana_kembali')
            ->first();


        if ($user->role == 'user') {

            return view('dashboard-user', [
                'jumlahAlat'   => $jumlahAlat,
                'alatTersedia' => $alatTersedia,
                'pengingatPengembalian' => $pengingatPengembalian,
            ]);
        }

        return view('dashboard', [
            'jumlahAlat'        => $jumlahAlat,
            'totalStok'         => $totalStok,
            'alatTersedia'      => $alatTersedia,
            'jumlahPeminjaman'  => $jumlahPeminjaman,

            // Tambahan
            'menunggu'          => $menunggu,
            'dipinjam'          => $dipinjam,
            'dikembalikan'      => $dikembalikan,
            'alatHampirHabis'   => $alatHampirHabis,
        ]);
    }
}
