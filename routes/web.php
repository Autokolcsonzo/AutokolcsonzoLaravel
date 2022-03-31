<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\osszesAutoMenubolController;
use App\Http\Controllers\FelhasznalokController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminFoglalasController;
use App\Http\Controllers\AdminAutokController;
use App\Http\Controllers\FelhasznaloFoglalas;
use App\Http\Controllers\FelhasznaloProfil;
use App\Http\Controllers\jarmuTalalatiListaController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\adminFelhasznaloMiddleware;
use App\Http\Middleware\adminFoglalasMiddleware;
use App\Http\Middleware\AutokListazasaController;


/* Regisztráció, bejelentkezés, kiejelntkezés */

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class, 'registration']);
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout']);

/* Alap routeok */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/* Route::get('/osszesAutoMenubol', function () {
    return view('osszesAutoMenubol');
}); */

Route::get('osszesAutoMenubol', [osszesAutoMenubolController::class, 'index'])->name('osszesAutoMenubol');

//Route::get('auto_fill/{mezo}/{helyszin}/{elvitel}/{visszahoz}/{marka}/{modell}/{kivitel}/{uzemanyag}/{evTol}/{evIg}/{arTol}/{arIg}/{checkboxok}/{oszlop}/{sorrend}', [AutokListazasaController::class, 'keresesParameteresen'])->name('osszesAutoMenubol');

Route::get('felhasznaloiProfil', function () {
    return view('felhasznaloiProfil');
});

Route::get('felhasznaloiFoglalasok', function () {
    return view('felhasznaloiFoglalasok');
});

Route::get('feltetelek', function () {
    return view('feltetelek');
})->name('feltetelek');

Route::get('rolunk', function () {
    return view('rolunk');
})->name('rolunk');

Route::get('foglalasUzenet', function () {
    return view('foglalasUzenet');
})->name('foglalasUzenet');

Route::get('/jarmuTalalatiLista', [jarmuTalalatiListaController::class, 'dashboard'])->middleware('isLoggedIn');

/* AdminAutok */
Route::middleware([adminMiddleware::class])->group(function () {
    Route::get('/adminAutok', [AdminAutokController::class, 'adatokKiiratasa']);
});

Route::get('/adminAutokEdit/{autok}', [AdminAutokController::class, 'edit']);
Route::put('/adminAutokEdit/{autok}', [AdminAutokController::class, 'update']);
Route::delete('/delete/{alvazSzam}', [AdminAutokController::class, 'delete']);

Route::post('/api/admin_autok', [AdminAutokController::class, 'ujAuto'])->name('admin_autok');
Route::post('/admin_modellek', [AdminAutokController::class, 'ujModell'])->name('admin_modellek');
Route::post('/admin_kepek', [AdminAutokController::class, 'ujKep'])->name('admin_kepek');

/* AdminFoglalas */
Route::middleware([adminFoglalasMiddleware::class])->group(function () {
    Route::get('adminFoglalas', [AdminFoglalasController::class, 'adatokKiiratasa']);
});

Route::get('/adminFoglalasModositas/{fogl_azonosito}', [AdminFoglalasController::class, 'edit'])->name('adminfoglalas.edit');
Route::get('/maiElvitel', [AdminFoglalasController::class, 'maiElvitel']);
Route::get('/maiVisszahozatal', [AdminFoglalasController::class, 'maiVisszahozatal']);

Route::post('/foglalas', [AdminFoglalasController::class, 'store'])->name('adminfoglalas');
Route::put('/adminFoglalasModositas/{fogl_azonosito}', [AdminFoglalasController::class, 'update'])->name('adminfoglalas.update');

/* AdminFelhasznalok */
Route::middleware([adminFelhasznaloMiddleware::class])->group(function () {
    Route::get('/adminFelhasznalok', [FelhasznalokController::class, 'adatokKiiratasa']);
});


/* felhasznaloProfilApi */
Route::get('/felhasznaloiProfil', [FelhasznaloProfil::class, 'bejelentkezett'])->middleware('isLoggedIn');

Route::put('/update', [FelhasznaloProfil::class, 'update'])->name('felhasznalok.update');

Route::put('/updatekep', [FelhasznaloProfil::class, 'profkepUpdate'])->name('felhasznalok.profkepUpdate');

Route::get('/felhasznaloiFoglalasok', [FelhasznaloFoglalas::class, 'index']);

Route::put('/updateallapot', [FelhasznaloFoglalas::class, 'update'])->name('foglalas.update');
