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
Route::get('/api/adminAutok', [AdminAutokController::class, 'adminIndex']);
Route::post('/adminAutok', [AdminAutokController::class, 'store'])->name('adminAutok');

Route::get('adminAutok', [AdminAutokController::class, 'create']);
Route::put('adminAutok/{auto}', [AdminAutokController::class, 'edit']);
Route::put('/adminAutok/{auto}', [AdminAutokController::class, 'update']);


//felhasznaloApi
Route::get('/api/felhasznalo', [FelhasznalokController::class, 'index']);
Route::get('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'show']);
Route::put('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'update'])->name('felhasznalo.update');

Route::post('/api/felhasznalo', [FelhasznalokController::class, 'store']);
Route::delete('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'destroy']);

/* Foglalás API */

Route::get('/api/foglalas', [AdminFoglalasController::class, 'index']);
Route::post('/foglalas', [AdminFoglalasController::class, 'store'])->name('adminfoglalas');
Route::get('/api/foglalas/expand={child}', [AdminFoglalasController::class, 'expand']);
