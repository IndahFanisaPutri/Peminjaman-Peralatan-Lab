<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatLaboratoriumController;
use App\Http\Controllers\PeminjamanAlatController;

Route::get('/', function () {
    return redirect()->route('alat.index');
});

Route::resource('alat', AlatLaboratoriumController::class);
Route::resource('peminjaman', PeminjamanAlatController::class);
Route::get('/peminjaman/setujui/{id}', [PeminjamanAlatController::class, 'setujui'])
    ->name('peminjaman.setujui');

Route::get('/peminjaman/tolak/{id}', [PeminjamanAlatController::class, 'tolak'])
    ->name('peminjaman.tolak');



