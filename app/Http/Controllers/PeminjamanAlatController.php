<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanAlat;
use App\Models\AlatLaboratorium;
use Illuminate\Http\Request;

class PeminjamanAlatController extends Controller
{

    public function index()
    {
        $peminjaman = PeminjamanAlat::with('alat')->get();

        return view('peminjaman.index', compact('peminjaman'));
    }



    public function create()
    {
        $alat = AlatLaboratorium::all();

        return view('peminjaman.create', compact('alat'));
    }





    public function store(Request $request)
    {

        // VALIDASI FORM
        $request->validate([

            'alat_id'=>'required',

            'nama_peminjam'=>'required',

            'nim_peminjam'=>'required',

            'jumlah_pinjam'=>'required|integer|min:1',

            'tanggal_pinjam'=>'required|date',

            'tanggal_rencana_kembali'=>'required|date|after_or_equal:tanggal_pinjam',

            'keperluan'=>'required'

        ]);



        // ==============================
        // POINT NO 4
        // CEK STOK ALAT
        // ==============================


        $alat = AlatLaboratorium::findOrFail(
            $request->alat_id
        );



        if(
            $alat->jumlah_tersedia 
            < 
            $request->jumlah_pinjam
        )
        {

            return back()
            ->with(
                'error',
                'Stok alat tidak mencukupi'
            );

        }





        // SIMPAN DATA PEMINJAMAN

        PeminjamanAlat::create([


            'alat_id'=>$request->alat_id,


            'nama_peminjam'=>$request->nama_peminjam,


            'nim_peminjam'=>$request->nim_peminjam,


            'fakultas'=>$request->fakultas,


            'jumlah_pinjam'=>$request->jumlah_pinjam,


            'keperluan'=>$request->keperluan,


            'tanggal_pinjam'=>$request->tanggal_pinjam,


            'tanggal_rencana_kembali'=>$request->tanggal_rencana_kembali,


            'status'=>'pending'


        ]);




        return redirect()

        ->route('peminjaman.index')

        ->with(
            'success',
            'Pengajuan peminjaman berhasil dikirim'
        );

    }







    public function setujui($id)
    {

        $peminjaman =
        PeminjamanAlat::findOrFail($id);



        $alat =
        AlatLaboratorium::findOrFail(
            $peminjaman->alat_id
        );



        // kurangi stok

        if(
            $alat->jumlah_tersedia 
            >= 
            $peminjaman->jumlah_pinjam
        )
        {


            $alat->jumlah_tersedia -= 
            $peminjaman->jumlah_pinjam;


            $alat->save();



            $peminjaman->update([

                'status'=>'disetujui',

                'disetujui_oleh'=>'Admin'

            ]);


        }



        return redirect()
        ->back()
        ->with(
            'success',
            'Peminjaman disetujui'
        );

    }







    public function tolak($id)
    {

        $peminjaman =
        PeminjamanAlat::findOrFail($id);



        $peminjaman->update([

            'status'=>'ditolak'

        ]);



        return redirect()
        ->back()
        ->with(
            'success',
            'Peminjaman ditolak'
        );

    }









    public function kembali($id)
    {

        $peminjaman =
        PeminjamanAlat::findOrFail($id);



        $alat =
        AlatLaboratorium::findOrFail(
            $peminjaman->alat_id
        );



        $terlambat = 0;



        if(
            now()->format('Y-m-d')
            >
            $peminjaman->tanggal_rencana_kembali
        )
        {


            $terlambat =
            now()->diffInDays(
                $peminjaman->tanggal_rencana_kembali
            );


        }



        // denda

        $denda = $terlambat * 5000;



        // kembalikan stok

        $alat->jumlah_tersedia +=
        $peminjaman->jumlah_pinjam;


        $alat->save();




        $peminjaman->update([


            'tanggal_kembali'=>now(),


            'kondisi_kembali'=>'baik',


            'denda'=>$denda,


            'status'=>'dikembalikan'


        ]);




        return redirect()

        ->route('peminjaman.index')

        ->with(
            'success',
            'Alat berhasil dikembalikan'
        );


    }






    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        //
    }



    public function update(Request $request, string $id)
    {
        //
    }



    public function destroy(string $id)
    {
        //
    }

}