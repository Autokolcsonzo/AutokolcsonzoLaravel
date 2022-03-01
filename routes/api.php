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

Route::apiResource('auto_fill', AutokListazasaController::class);


Route::get('auto_fill', [AutokListazasaController::class, 'index']);
Route::get('adminAuto', [AutokListazasaController::class, 'adminIndex']);
Route::get('osszesFelhasznalo', [AutokListazasaController::class, 'adminOsszesFelhasznalo']);

Route::delete('adminAutok/{alvazSzam}', [AutokListazasaController::class, 'destroy']);

/* Route::get('auto/{alvazSzam}', 'AutokListazasaController@show');
Route::post('auto', 'AutokListazasaController@store');
Route::put('auto/{alvazSzam}', 'AutokListazasaController@update');
Route::delete('auto/{alvazSzam}', 'AutokListazasaController@delete'); */