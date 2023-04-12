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

Route::get("usuarios/buscar", [\App\Http\Controllers\api\UserController::class, "search"])->name("api.users.search");
Route::apiResource("localidades", \App\Http\Controllers\api\LocalityController::class);
Route::apiResource("usuarios", \App\Http\Controllers\api\UserController::class);
