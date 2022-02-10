<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BejelentkezesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/bejelentkezes', function () {
    return view('bejelentkezes');
});

Route::get('/regisztracio', function () {
    return view('regisztracio');
});

Route::get('/user', [UserController::class, 'index']);

Route::get('bejelentkezes', [BejelentkezesController::class, 'index'])->name('bejelentkezes');
Route::post('bejelentkezes', [BejelentkezesController::class, 'login']);

Route::post('regisztracio', [RergisztralasController::class, 'mentes']);

Route::get('osszesAutoMenubol', function () {
    return view('osszesAutoMenubol');
});
