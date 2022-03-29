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
use App\Http\Controllers\AdminFelhasznalo;
use App\Http\Controllers\FelhasznaloFoglalas;
use App\Http\Controllers\FelhasznaloProfil;
use App\Http\Controllers\jarmuTalalatiListaController;
use App\Http\Middleware\adminMiddleware;


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
Route::get('felhasznaloiFoglalasok', function () {
    return view('felhasznaloiFoglalasok');
});

Route::get('jarmuTalalatiLista', function () {
    return view('jarmuTalalatiLista');
});

Route::get('/jarmuTalalatiLista', [jarmuTalalatiListaController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('adminFelhasznalok', function () {
    return view('adminFelhasznalok');
});

Route::get('adminFoglalas', function () {
    return view('adminFoglalas');
});


Route::middleware([adminMiddleware::class])->group(function () {
    Route::get('/adminAutok', [AdminAutokController::class, 'adatokKiiratasa']);
    Route::get('/adminAutokEdit/{autok}', [AdminAutokController::class, 'edit']);
    Route::put('/adminAutokEdit/{autok}', [AdminAutokController::class, 'update']);
    Route::delete('/delete/{alvazSzam}', [AdminAutokController::class, 'delete']);

    Route::post('/admin_autok', [AdminAutokController::class, 'ujAuto'])->name('admin_autok');
    Route::post('/admin_modellek', [AdminAutokController::class, 'ujModell'])->name('admin_modellek');
    Route::post('/admin_kepek', [AdminAutokController::class, 'ujKep'])->name('admin_kepek');
});

//felhasznaloProfilApi


Route::get('/felhasznaloiProfil', [FelhasznaloProfil::class, 'bejelentkezett'])->middleware('isLoggedIn');

Route::put('/update', [FelhasznaloProfil::class, 'update'])->name('felhasznalok.update');

Route::put('/updatekep', [FelhasznaloProfil::class, 'profkepUpdate'])->name('felhasznalok.profkepUpdate');





Route::get('/adminFelhasznalok', [FelhasznalokController::class, 'adatokKiiratasa']);

/* Foglalás API */
Route::post('/foglalas', [AdminFoglalasController::class, 'store'])->name('adminfoglalas');
Route::get('adminFoglalas', [AdminFoglalasController::class, 'adatokKiiratasa']);
Route::get('/adminFoglalasModositas/{fogl_azonosito}', [AdminFoglalasController::class, 'edit'])->name('adminfoglalas.edit');
Route::put('/adminFoglalasModositas/{fogl_azonosito}', [AdminFoglalasController::class, 'update'])->name('adminfoglalas.update');
Route::get('/maiElvitel', [AdminFoglalasController::class, 'maiElvitel']);
Route::get('/maiVisszahozatal', [AdminFoglalasController::class, 'maiVisszahozatal']);



Route::get('/felhasznaloiFoglalasok', [FelhasznaloFoglalas::class, 'index']);


Route::put('/updateallapot', [FelhasznaloFoglalas::class, 'update'])->name('foglalas.update');
