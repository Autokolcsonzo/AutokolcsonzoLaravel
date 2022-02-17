<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\BejelentkezesController;
use App\Http\Controllers\RegisztralasController;
use App\Http\Controllers\osszesAutoMenubolController;
use App\Http\Controllers\MenuRolunkController;
use App\Http\Controllers\MenuFeltetelekController;
use App\Http\Controllers\FelhasznalokController;
use App\Http\Controllers\jarmuTalalatiLista;



Route::get('/', [FooldalController::class, 'index'])->name('welcome');

Route::get('bejelentkezes', [BejelentkezesController::class, 'index'])->name('bejelentkezes');
Route::post('bejelentkezes', [BejelentkezesController::class, 'addBejelentkezes']);

Route::get('regisztracio', [RegisztralasController::class, 'index'])->name('regisztracio');
Route::post('regisztracio', [RegisztralasController::class, 'signup']);

Route::get('osszesAutoMenubol', function () {
    return view('osszesAutoMenubol');
});

Route::get('osszesAutoMenubol', [osszesAutoMenubolController::class, 'index'])->name('osszesAutoMenubol');
Route::get('rolunk', [MenuRolunkController::class, 'index'])->name('rolunk');
Route::get('feltetelek', [MenuFeltetelekController::class, 'index'])->name('feltetelek');




//felhasznaloApi


Route::get('/api/felhasznalo', [FelhasznalokController::class, 'index']);
Route::get('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'show']);
Route::put('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'update']);
Route::post('/api/felhasznalo', [FelhasznalokController::class, 'store']);
Route::delete('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'destroy']);


Route::get('felhasznaloiProfil', function () {
    return view('felhasznaloiProfil');
});

Route::get('jarmuTalalatiLista', function () {
    return view('jarmuTalalatiLista');
});
