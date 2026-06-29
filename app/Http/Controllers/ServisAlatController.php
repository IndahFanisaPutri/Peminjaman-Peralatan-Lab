<?php

namespace App\Http\Controllers;


use App\Models\ServisAlat;
use App\Models\AlatLaboratorium;
use Illuminate\Http\Request;



class ServisAlatController extends Controller
{


public function index()
{

    $servis = ServisAlat::with('alat')->get();

    return view('servis.index',
    compact('servis'));

}





public function create()
{

    $alat = AlatLaboratorium::all();

    return view('servis.create',
    compact('alat'));

}





public function store(Request $request)
{

    $request->validate([

        'alat_id'=>'required',
        'tanggal_servis'=>'required',
        'kerusakan'=>'required'

    ]);



    ServisAlat::create([

        'alat_id'=>$request->alat_id,

        'tanggal_servis'=>$request->tanggal_servis,

        'teknisi'=>$request->teknisi,

        'kerusakan'=>$request->kerusakan,

        'tindakan'=>$request->tindakan,

        'status'=>'menunggu'

    ]);



    return redirect()
    ->route('servis.index')
    ->with(
    'success',
    'Jadwal servis berhasil dibuat'
    );

}




public function update(Request $request,$id)
{


$servis = ServisAlat::findOrFail($id);



$servis->update([

'status'=>$request->status,

'tindakan'=>$request->tindakan

]);



return back();

}




public function destroy($id)
{

ServisAlat::findOrFail($id)->delete();


return back();

}


}