<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanAlat;

class PengembalianController extends Controller
{
    /**
     * Halaman daftar pengembalian milik user
     */
    public function index()
    {
        $pengembalian = PeminjamanAlat::with('alat')
            ->where('user_id', Auth::id())
            ->whereIn('status', [
                'disetujui',
                'menunggu_pengembalian',
                'dikembalikan',
                'ditolak'
            ])
            ->latest()
            ->get();

        return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Form pengajuan pengembalian
     */
    public function create()
    {
        $peminjaman = PeminjamanAlat::with('alat')
            ->where('user_id', Auth::id())
            ->where('status', 'disetujui')
            ->latest()
            ->get();

        return view('pengembalian.create', compact('peminjaman'));
    }

    /**
     * Simpan pengajuan pengembalian
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman_alat,id',
        ]);

        $pinjam = PeminjamanAlat::findOrFail(
            $request->peminjaman_id
        );

        // Pastikan hanya pemilik data
        if ($pinjam->user_id != Auth::id()) {
            abort(403);
        }

        // Pastikan status masih dipinjam
        if ($pinjam->status != 'disetujui') {

            return back()->with(
                'error',
                'Data tidak dapat diajukan.'
            );
        }

        $pinjam->status = 'menunggu_pengembalian';
        $pinjam->save();

        return redirect()
            ->route('pengembalian.index')
            ->with(
                'success',
                'Pengajuan pengembalian berhasil dikirim.'
            );
    }

    /**
     * Halaman admin
     */
    public function adminIndex()
    {
        $pengembalian = PeminjamanAlat::with('alat', 'user')
            ->whereIn('status', [
                'menunggu_pengembalian',
                'dikembalikan'
            ])
            ->latest()
            ->get();

        return view(
            'admin.pengembalian.index',
            compact('pengembalian')
        );
    }

    /**
     * Detail pengembalian
     */
    public function show($id)
    {
        $pengembalian = PeminjamanAlat::with('alat')
            ->findOrFail($id);

        return view(
            'admin.pengembalian.show',
            compact('pengembalian')
        );
    }

    /**
     * Verifikasi pengembalian oleh admin
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kondisi_kembali' => 'required'
        ]);

        $pinjam = PeminjamanAlat::findOrFail($id);

        $alat = $pinjam->alat;

        $terlambat = 0;

        if (
            now()->format('Y-m-d') >
            $pinjam->tanggal_rencana_kembali
        ) {

            $terlambat = now()->diffInDays(
                $pinjam->tanggal_rencana_kembali
            );
        }


        // stok kembali
        $alat->jumlah_tersedia +=
            $pinjam->jumlah_pinjam;

        $alat->save();

        $pinjam->update([

            'status' => 'dikembalikan',

            'tanggal_kembali' => now(),

            'kondisi_kembali' => $request->kondisi_kembali,



        ]);

        return redirect()
            ->route('admin.pengembalian.index')
            ->with(
                'success',
                'Pengembalian berhasil diverifikasi.'
            );
    }
}
