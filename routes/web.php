<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatLaboratoriumController;
use App\Http\Controllers\PeminjamanAlatController;
use App\Http\Controllers\ServisAlatController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alat',AlatLaboratoriumController::class)
->middleware(['auth','role:admin']);

Route::middleware('auth')->group(function(){
    Route::resource('peminjaman',PeminjamanAlatController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::get('/dashboard',
[DashboardController::class,'index'])
->middleware(['auth'])
->name('dashboard');

Route::resource('servis',ServisAlatController::class)
->middleware(['auth','role:admin']);

Route::get('/laporan',[LaporanController::class,'index'])
->middleware(['auth','role:admin'])
->name('laporan.index');

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');

})->name('logout');