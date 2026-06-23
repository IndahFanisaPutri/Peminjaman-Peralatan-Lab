<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatLaboratoriumController;
use App\Http\Controllers\PeminjamanAlatController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()
    ->route('dashboard');
});

Route::resource('alat', AlatLaboratoriumController::class);
Route::resource('peminjaman', PeminjamanAlatController::class);
Route::get('/peminjaman/setujui/{id}', [PeminjamanAlatController::class, 'setujui'])
    ->name('peminjaman.setujui');

Route::get('/peminjaman/tolak/{id}', [PeminjamanAlatController::class, 'tolak'])
    ->name('peminjaman.tolak');

Route::get('/peminjaman/kembali/{id}', 
[
    PeminjamanAlatController::class,
    'kembali'
])
->name('peminjaman.kembali');

Route::get('/dashboard',[DashboardController::class,'index'])
->name('dashboard');