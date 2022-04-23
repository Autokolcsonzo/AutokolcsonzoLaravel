<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutokListazasaController;
use App\Http\Controllers\KedvezmenyekController;
use App\Http\Controllers\KeresoViewController;
use App\Http\Controllers\FelhasznaloAdmin;
use App\Http\Controllers\TelephelyController;
use App\Http\Controllers\FizetesController;
use App\Http\Controllers\FoglalasController;
use App\Models\Telephely;

/* use App\Http\Controllers\AdminAutokController; */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('auto_fill', AutokListazasaController::class);
Route::apiResource('kedvezmeny', KedvezmenyekController::class);

Route::get('auto_fill/{mezo}/{helyszin}/{elvitel}/{visszahoz}/{marka}/{modell}/{kivitel}/{uzemanyag}/{evTol}/{evIg}/{arTol}/{arIg}/{checkboxok}/{oszlop}/{sorrend}', [AutokListazasaController::class, 'keresesParameteresen']);
Route::get('kedvezmeny', [KedvezmenyekController::class, 'kedvezmenyek']);
Route::post('foglalas', [FoglalasController::class, 'foglalas'])->name('ujFoglalas');
Route::post('fizetes', [FizetesController::class, 'fizetes'])->name('ujFizetes');

Route::apiResource('keresoview', KeresoViewController::class);
Route::get('keresoview', [KeresoViewController::class, 'index']);


/* Route::apiResource('felhasznaloadmin',FelhasznaloAdmin::class)->parameters([
    'felhasznaloadmin' => 'felhasznalo_id'
]);; */


Route::get('felhasznaloadmin', [FelhasznaloAdmin::class, 'index']);
Route::post('felhasznaloadmin', [FelhasznaloAdmin::class, 'store'])->name('uj.felhasznaloadmin');

Route::delete('felhasznaloadmin/delete/{id}', [FelhasznaloAdmin::class, 'destroy']);
Route::get('felhasznaloadmin/keres', [FelhasznaloAdmin::class, 'keres']);


Route::get('telephely', [TelephelyController::class, 'index']);