<?php

use App\Http\Controllers\api\BiodataController;
use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\UserController;
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
Route::get('list-produk',[ProdukController::class,'getproduk']);
Route::post('create-produk',[ProdukController::class,'createproduk']);
Route::get('show-produk/{id}',[ProdukController::class,'showproduk']);
Route::post('update-produk/{id}',[ProdukController::class,'updateproduk']);
Route::get('delete-produk/{id}',[ProdukController::class,'deleteproduk']);

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::get('getbiodata',[BiodataController::class,'getbiodata']);
