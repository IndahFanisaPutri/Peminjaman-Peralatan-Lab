<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanAlat;
use App\Models\AlatLaboratorium;
use Illuminate\Http\Request;

class PeminjamanAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = PeminjamanAlat::with('alat')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alat = AlatLaboratorium::all();
        return view('peminjaman.create', compact('alat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required',
            'nama_peminjam' => 'required',
            'nim_peminjam' => 'required',
            'jumlah_pinjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_rencana_kembali' => 'required',
        ]);

        PeminjamanAlat::create([
            'alat_id' => $request->alat_id,
            'nama_peminjam' => $request->nama_peminjam,
            'nim_peminjam' => $request->nim_peminjam,
            'fakultas' => $request->fakultas,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'keperluan' => $request->keperluan,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_rencana_kembali' => $request->tanggal_rencana_kembali,
            'status' => 'menunggu'
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim');
    }

    public function setujui($id)
    {
        $peminjaman = \App\Models\PeminjamanAlat::findOrFail($id);

        $alat = \App\Models\AlatLaboratorium::findOrFail($peminjaman->alat_id);

        // kurangi stok
        if ($alat->jumlah_tersedia >= $peminjaman->jumlah_pinjam) {
            $alat->jumlah_tersedia -= $peminjaman->jumlah_pinjam;
            $alat->save();

            $peminjaman->update([
                'status' => 'disetujui',
                'disetujui_oleh' => 'Admin'
            ]);
        }

        return redirect()->back()->with('success', 'Peminjaman disetujui');
    }

    public function tolak($id)
    {
        $peminjaman = \App\Models\PeminjamanAlat::findOrFail($id);

        $peminjaman->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Peminjaman ditolak');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
