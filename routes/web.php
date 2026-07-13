<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatLaboratoriumController;
use App\Http\Controllers\PeminjamanAlatController;
use App\Http\Controllers\ServisAlatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengembalianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alat',AlatLaboratoriumController::class)
->middleware(['auth','role:admin']);

Route::middleware('auth')->group(function(){
    Route::resource('peminjaman',PeminjamanAlatController::class);
    Route::put('/peminjaman/{id}/setujui',
    [PeminjamanAlatController::class,'setujui'])
    ->name('peminjaman.setujui');

    Route::put('/peminjaman/{id}/tolak',
        [PeminjamanAlatController::class,'tolak'])
        ->name('peminjaman.tolak');

    Route::put('/peminjaman/{id}/kembali',
        [PeminjamanAlatController::class,'kembali'])
        ->name('peminjaman.kembali');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::get('/dashboard', [DashboardController::class,'index'])
    ->middleware(['auth','role:admin'])
    ->name('dashboard');

Route::get('/user/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth','role:user'])
    ->name('user.dashboard');

Route::resource('servis',ServisAlatController::class)
->middleware(['auth','role:admin']);

Route::get('/laporan',[LaporanController::class,'index'])
->middleware(['auth','role:admin'])
->name('laporan.index');


Route::middleware(['auth','role:user'])->group(function(){

    Route::get('/pengembalian',
        [PengembalianController::class,'index'])
        ->name('pengembalian.index');

    Route::get('/pengembalian/create',
        [PengembalianController::class,'create'])
        ->name('pengembalian.create');

    Route::post('/pengembalian',
        [PengembalianController::class,'store'])
        ->name('pengembalian.store');

});

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){

        Route::get(
            '/pengembalian',
            [PengembalianController::class,'adminIndex']
        )->name('pengembalian.index');

        Route::get(
            '/pengembalian/{id}',
            [PengembalianController::class,'show']
        )->name('pengembalian.show');

        Route::put(
            '/pengembalian/{id}',
            [PengembalianController::class,'update']
        )->name('pengembalian.update');

});