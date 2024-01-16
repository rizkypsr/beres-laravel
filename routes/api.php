<?php

use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\ChallengeController;
use App\Http\Controllers\Api\EnvController;
use App\Http\Controllers\Api\InfoController;
use App\Http\Controllers\Api\UserChallengeController;
use App\Http\Controllers\CustomerapiController;
use App\Models\challenges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/customer', [App\Http\Controllers\CustomerapiController::class, 'index']);
Route::get('/customerget/{id}', [App\Http\Controllers\CustomerapiController::class, 'customerget']);

Route::post('/topupcustomer/{id}', [App\Http\Controllers\CustomerapiController::class, 'topupcustomer']);


Route::get('/toko', [App\Http\Controllers\TokoapiController::class, 'index']);


Route::get('/umkm/{id}', [App\Http\Controllers\UmkmapiController::class, 'index']);

Route::get('/produkumkm/{id}', [App\Http\Controllers\ProdukumkmapiController::class, 'index']);

Route::get('/wa', [App\Http\Controllers\SosmedapiController::class, 'indexwa']);
Route::get('/te', [App\Http\Controllers\SosmedapiController::class, 'indexte']);

Route::get('/faq', [App\Http\Controllers\FaqapiController::class, 'index']);

Route::get('/produkjs/{id}', [App\Http\Controllers\ProdukjsapiController::class, 'index']);

Route::get('/detailppob/{id}', [App\Http\Controllers\DetailppobapiController::class, 'index']);

Route::get('/lj', [App\Http\Controllers\LayananjemputapiController::class, 'index']);
Route::post('/ljadd', [App\Http\Controllers\LayananjemputapiController::class, 'add']);

Route::get('/qurban', [App\Http\Controllers\QurbansampahapiController::class, 'index']);

Route::get('/transaksijs/{id}', [App\Http\Controllers\apiTransaksijsController::class, 'index']);
Route::post('/transaksijsadd/{id}', [App\Http\Controllers\apiTransaksijsController::class, 'add']);

Route::get('/transaksippob/{id}', [App\Http\Controllers\apitransaksippobController::class, 'index']);
Route::post('/transaksippobadd/{id}', [App\Http\Controllers\apitransaksippobController::class, 'add']);

Route::get('/kota', [App\Http\Controllers\apiKotaController::class, 'index']);

Route::get('/kecamatan', [App\Http\Controllers\apiKecamatanController::class, 'index']);

Route::get('/ppob', [App\Http\Controllers\apippobController::class, 'index']);


Route::get('/bayartoko/{id}', [App\Http\Controllers\apibayartokoController::class, 'index']);
Route::post('/bayartokoadd/{id}', [App\Http\Controllers\apibayartokoController::class, 'add']);

Route::get('/transfer/{id}', [App\Http\Controllers\apitransferController::class, 'index']);
Route::post('/transferadd/{id}', [App\Http\Controllers\apitransferController::class, 'add']);

Route::get('/log/{id}/{type}', [App\Http\Controllers\logController::class, 'index']);
Route::get('/banner', [App\Http\Controllers\apibannerController::class, 'index']);

// Env Learning
Route::post('/elearnings/check-pin', [EnvController::class, 'checkPinValidity']);

// Challenge
Route::apiResource('challenge', ChallengeController::class);
Route::apiResource('user-challenges', UserChallengeController::class);

// Artikel
Route::apiResource('artikel', ArtikelController::class);

// Info
Route::apiResource('info', InfoController::class);
