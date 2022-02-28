<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutokListazasaController;
use App\Http\Controllers\AdminAutokController;

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

Route::apiResource('auto', AutokListazasaController::class);


Route::get('auto', [AutokListazasaController::class, 'index']);
Route::get('adminAutok', [AutokListazasaController::class, 'adminIndex']);
/* Route::get('adminAutok', [AdminAutokController::class, 'index']);*/
Route::get('osszesFelhasznalo', [AutokListazasaController::class, 'adminOsszesFelhasznalok']); 

Route::delete('adminAutok/{alvazSzam}', [AutokListazasaController::class, 'destroy']);

/* Route::get('auto/{alvazSzam}', 'AutokListazasaController@show');
Route::post('auto', 'AutokListazasaController@store');
Route::put('auto/{alvazSzam}', 'AutokListazasaController@update');
Route::delete('auto/{alvazSzam}', 'AutokListazasaController@delete'); */