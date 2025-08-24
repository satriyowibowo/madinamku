<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pendaftaran', [SantriController::class, 'create'])->name('santri.create');
Route::post('/pendaftaran', [SantriController::class, 'store'])->name('santri.store');
Route::get('/pendaftaran/print/{id}', [SantriController::class, 'print'])->name('santri.print');

