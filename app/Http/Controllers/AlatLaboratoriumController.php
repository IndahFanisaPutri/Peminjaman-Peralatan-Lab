<?php

namespace App\Http\Controllers;

use App\Models\AlatLaboratorium;
use Illuminate\Http\Request;

class AlatLaboratoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $alat = AlatLaboratorium::all();
        return view('alat.index', compact('alat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'kode_alat' => 'required',
            'nama_alat' => 'required',
            'jumlah' => 'required|integer',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;

        if($request->hasFile('foto')){
            $foto = $request->file('foto')
            ->store('foto_alat','public');
        }


        AlatLaboratorium::create([
            'kode_alat' => $request->kode_alat,
            'nama_alat' => $request->nama_alat,
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'model' => $request->model,
            'kondisi' => $request->kondisi ?? 'baik',
            'jumlah' => $request->jumlah,
            'jumlah_tersedia' => $request->jumlah,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect()->route('alat.index')
            ->with('success', 'Data alat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $alat = AlatLaboratorium::findOrFail($id);
         return view('alat.show', compact('alat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $alat = AlatLaboratorium::findOrFail($id);
        return view('alat.edit', compact('alat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $alat = AlatLaboratorium::findOrFail($id);

        $alat->update([
            'kode_alat' => $request->kode_alat,
            'nama_alat' => $request->nama_alat,
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'model' => $request->model,
            'jumlah' => $request->jumlah,
            'jumlah_tersedia' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('alat.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $alat = AlatLaboratorium::findOrFail($id);
         $alat->delete();

        return redirect()->route('alat.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
