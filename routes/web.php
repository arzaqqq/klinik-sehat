<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LaporanDaftarController;
use App\Http\Controllers\LaporanPasienControlller;
use Illuminate\Support\Facades\Auth;
use Database\Factories\PasienFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Authenticated;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use Illuminate\Auth\Middleware\Authenticate;


Route::middleware(Authenticate::class)->group(function(){
    Route::resource('/laporan-daftar',LaporanDaftarController::class);
    Route::resource('/laporan-pasien',LaporanPasienControlller::class);
    Route::resource('/pasien', PasienController::class);
    Route::resource('/daftar', DaftarController::class);
    Route::resource('/poli', PoliController::class);
    
});




Route::get('/logout', function () {
    Auth::logout(); // This logs out the user
    return redirect('/login'); // Redirect to the login page after logout
})->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');