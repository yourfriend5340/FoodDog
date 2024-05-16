<?php

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



Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::post('/user', [App\Http\Controllers\UserController::class, 'store']);
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'delete']);
//Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::patch('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);