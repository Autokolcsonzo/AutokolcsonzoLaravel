<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutokListazasaController;
use App\Models\Auto;

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

Route::apiResource("auto", AutokListazasaController::class);

Route::get('auto', 'App\Http\Controllers\AutokListazasaController@index'); // kell elé a teljes útvonal különben itthon nem tetszik neki :D:D:D:DS
Route::get('auto/{alvazSzam}', 'App\Http\Controllers\AutokListazasaController@show');
Route::post('auto', 'App\Http\Controllers\AutokListazasaController@store');
Route::put('auto/{alvazSzam}', 'App\Http\Controllers\AutokListazasaController@update');
Route::delete('auto/{alvazSzam}', 'App\Http\Controllers\AutokListazasaController@delete');