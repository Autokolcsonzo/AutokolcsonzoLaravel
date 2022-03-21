<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\BejelentkezesController;
use App\Http\Controllers\RegisztralasController;
use App\Http\Controllers\osszesAutoMenubolController;
use App\Http\Controllers\MenuRolunkController;
use App\Http\Controllers\MenuFeltetelekController;
use App\Http\Controllers\FelhasznalokController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\KeresoViewController;
use App\Http\Controllers\AdminFoglalasController;
use App\Http\Controllers\AdminAutokController;
use App\Http\Controllers\FelhasznaloProfil;
use App\Http\Controllers\jarmuTalalatiListaController;

/* Regisztráció, bejelentkezés, kiejelntkezés */

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class, 'registration']);
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout']);

/* Alap routeok */
Route::get('/', [FooldalController::class, 'index'])->name('welcome');
Route::get('bejelentkezes', [BejelentkezesController::class, 'index'])->name('bejelentkezes');
Route::get('regisztracio', [RegisztralasController::class, 'index'])->name('regisztracio');
Route::get('osszesAutoMenubol', [osszesAutoMenubolController::class, 'index'])->name('osszesAutoMenubol');
Route::get('rolunk', [MenuRolunkController::class, 'index'])->name('rolunk');
Route::get('feltetelek', [MenuFeltetelekController::class, 'index'])->name('feltetelek');
Route::get('felhasznaloiProfil', function () {
    return view('felhasznaloiProfil');
});

Route::get('jarmuTalalatiLista', function () {
    return view('jarmuTalalatiLista');
});

Route::get('/jarmuTalalatiLista', [jarmuTalalatiListaController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('adminAutok', function () {
    return view('adminAutok');
});

Route::get('adminFelhasznalok', function () {
    return view('adminFelhasznalok');
});

Route::get('adminFoglalas', function () {
    return view('adminFoglalas');
});



/* Admin API */

Route::get('/adminAutok', [AdminAutokController::class, 'adatokKiiratasa']);
Route::post('/adminAutok', [AdminAutokController::class, 'ujAuto'])->name('adminAutok');
Route::post('/adminAutok', [AdminAutokController::class, 'ujModell'])->name('adminAutok');
Route::post('/adminAutok', [AdminAutokController::class, 'ujKep'])->name('adminAutok');
Route::get('/adminAutokEdit/{autok}', [AdminAutokController::class, 'edit']);
Route::put('/adminAutokEdit/{autok}', [AdminAutokController::class, 'update']);
Route::delete('/delete/{alvazSzam}', [AdminAutokController::class, 'delete']);




//felhasznaloProfilApi
Route::get('/api/felhasznalo', [FelhasznalokController::class, 'index']);

Route::get('/felhasznaloiProfil', [FelhasznaloProfil::class, 'bejelentkezett'])->middleware('isLoggedIn');

Route::put('/update', [FelhasznaloProfil::class, 'update'])->name('felhasznalok.update');





Route::get('/adminFelhasznalok', [FelhasznalokController::class, 'adatokKiiratasa']);

/* Foglalás API */
Route::post('/foglalas', [AdminFoglalasController::class, 'store'])->name('adminfoglalas');
Route::get('/api/foglalas/expand={child}', [AdminFoglalasController::class, 'expand']);
Route::get('adminFoglalas', [AdminFoglalasController::class, 'adatokKiiratasa']);
