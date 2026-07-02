<?php

namespace App\Http\Controllers;


use App\Models\ServisAlat;
use App\Models\AlatLaboratorium;
use Illuminate\Http\Request;



class ServisAlatController extends Controller
{


public function index()
{


$servis =
ServisAlat::with('alat')->get();



return view(
'servis.index',
compact('servis')
);


}





public function create()
{


$alat =
AlatLaboratorium::all();


return view(
'servis.create',
compact('alat')
);


}







public function store(Request $request)
{


$request->validate([


'alat_id'=>'required',

'tanggal_servis'=>'required|date',

'foto'=>'image|mimes:jpg,jpeg,png|max:2048'


]);






$foto = null;



if($request->hasFile('foto'))
{

$foto =
$request->file('foto')
->store('foto_servis','public');

}






ServisAlat::create([


'alat_id'=>$request->alat_id,


'tanggal_servis'=>$request->tanggal_servis,


'kerusakan'=>$request->kerusakan,


'tindakan'=>$request->tindakan,


'foto'=>$foto


]);






return redirect()

->route('servis.index')

->with(
'success',
'Data servis berhasil ditambahkan'
);


}






public function update(Request $request,$id)
{


$servis =
ServisAlat::findOrFail($id);



$servis->update([


'status'=>$request->status,


'tanggal_selesai'=>$request->tanggal_selesai,


'tindakan'=>$request->tindakan


]);




return back()

->with(
'success',
'Status servis diperbarui'
);


}







public function destroy($id)
{


ServisAlat::findOrFail($id)
->delete();



return back();

}



}