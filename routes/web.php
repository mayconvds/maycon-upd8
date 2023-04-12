<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get("editar/usuario/{id}", [App\Http\Controllers\UserController::class, "editUser"])->name("site.editarusuario");
Route::get("usuarios", [App\Http\Controllers\UserController::class, "listUser"])->name("site.usuarios");
Route::get("cadastro", [App\Http\Controllers\UserController::class, "register"])->name("site.cadastroform");

