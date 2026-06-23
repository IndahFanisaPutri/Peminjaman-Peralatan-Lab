<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatLaboratoriumController;

Route::get('/', function () {
    return redirect()->route('alat.index');
});

Route::resource('alat', AlatLaboratoriumController::class);



