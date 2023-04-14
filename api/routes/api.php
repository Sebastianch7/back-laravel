<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UserController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::post('login', [AuthController::class, 'login']);
Route::apiResource('user',UserController::class);
Route::apiResource('client',ClientsController::class);

Route::middleware('auth:sanctum')->group(function (){
    
    //Route::post('registerUser', [AuthController::class, 'registerUser']);
    Route::get('logout', [AuthController::class, 'logout']);

});