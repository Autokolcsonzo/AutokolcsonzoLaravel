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

use App\Http\Controllers\FormController;

use App\Http\Controllers\CustomAuthController;
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('regisztracio', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('regisztracio', [CustomAuthController::class, 'customRegistration'])->name('regisztracio); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/', [FooldalController::class, 'index'])->name('welcome');

Auth::routes();
Route::get('bejelentkezes', [BejelentkezesController::class, 'index'])->name('bejelentkezes');
Route::post('bejelentkezes', [BejelentkezesController::class, 'store']);

Route::get('regisztracio', [RegisztralasController::class, 'index'])->name('regisztracio');
Route::post('regisztracio', [RegisztralasController::class, 'store']); 

/* Route::group(['middleware' => 'web'], function() {
        Route::get('regisztracio', 'RegisztralasController@store');
    }); */

Route::get('osszesAutoMenubol', function () {
    return view('osszesAutoMenubol');
});

Route::get('osszesAutoMenubol', [osszesAutoMenubolController::class, 'index'])->name('osszesAutoMenubol');
Route::get('rolunk', [MenuRolunkController::class, 'index'])->name('rolunk');
Route::get('feltetelek', [MenuFeltetelekController::class, 'index'])->name('feltetelek');




//felhasznaloApi


Route::get('/api/felhasznalo', [FelhasznalokController::class, 'index']);
Route::get('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'show']);
Route::put('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'update'])->name('felhasznalo.update');

Route::post('/api/felhasznalo', [FelhasznalokController::class, 'store']);
Route::delete('/api/felhasznalo/{felhasznalo_id}', [FelhasznalokController::class, 'destroy']);


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

/* Route::get('probaForm', function () {
    return view('probaForm');
}); */

Route::get('probaForm', [FormController::class, 'index']);
Route::post('store-form', [FormController::class, 'store']);