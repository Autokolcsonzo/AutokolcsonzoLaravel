<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BejelentkezesController;
use App\Http\Controllers\RegisztralasController;
use App\Http\Controllers\osszesAutoMenubolController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [FooldalController::class, 'index'])->name('welcome');

/* Route::get('/bejelentkezes', function () {
    return view('bejelentkezes');
});

Route::get('/regisztracio', function () {
    return view('regisztracio');
}); */

/* Route::get('/user', [UserController::class, 'index']); */

Route::get('bejelentkezes', [BejelentkezesController::class, 'index'])->name('bejelentkezes');
Route::post('bejelentkezes', [BejelentkezesController::class, 'addBejelentkezes']);

Route::get('regisztracio', [RegisztralasController::class, 'index'])->name('regisztracio');
Route::post('regisztracio', [RegisztralasController::class, 'signup']);

//Route::get('osszesAutoMenubol', [osszesAutoMenubolController::class, 'osszesAutoMenubol'])->name('osszesAutoMenubol');

Route::get('osszesAutoMenubol', [osszesAutoMenubolController::class, 'index'])->name('osszesAutoMenubol');