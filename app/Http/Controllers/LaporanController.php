<?php

namespace App\Http\Controllers;


use App\Models\AlatLaboratorium;
use App\Models\PeminjamanAlat;


class LaporanController extends Controller
{


    public function index()
    {


        // total alat

        $jumlahAlat =
        AlatLaboratorium::count();




        // total stok

        $totalStok =
        AlatLaboratorium::sum('jumlah');




        // jumlah peminjaman

        $jumlahPeminjaman =
        PeminjamanAlat::count();






        // alat paling sering dipinjam


        $alatTerpopuler =

        PeminjamanAlat::selectRaw(
            'alat_id, count(*) as total'
        )

        ->groupBy('alat_id')

        ->orderByDesc('total')

        ->with('alat')

        ->first();








        // kondisi alat


        $kondisiAlat = [

            'baik' =>
            AlatLaboratorium::where(
                'kondisi',
                'baik'
            )->count(),


            'rusak' =>
            AlatLaboratorium::where(
                'kondisi',
                'rusak'
            )->count(),


            'perbaikan' =>
            AlatLaboratorium::where(
                'kondisi',
                'perbaikan'
            )->count(),

        ];







        return view(
            'laporan.index',
            compact(

                'jumlahAlat',

                'totalStok',

                'jumlahPeminjaman',

                'alatTerpopuler',

                'kondisiAlat'

            )
        );


    }


}