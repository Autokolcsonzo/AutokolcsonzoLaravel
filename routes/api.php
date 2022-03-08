<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutokListazasaController;
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

Route::apiResource('auto_fill', AutokListazasaController::class);


Route::get('auto_fill', [AutokListazasaController::class, 'index']);
//Route::delete('adminAutok/{alvazSzam}', [AutokListazasaController::class, 'destroy']); 

Route::apiResource('KeresoView', AutokListazasaController::class);
Route::get('KeresoView', [AutokListazasaController::class, 'KeresoView']);
