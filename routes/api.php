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

/* Admin */
Route::post('/admin/create/player','App\Http\Controller\AdminController@createPlayer');//Crear Player
Route::post('/admin/create/item','App\Http\Controller\AdminController@createItem');//Crear Item
Route::put('/admin/edit/{itemId}','App\Http\Controller\AdminController@editItem');//Editar Item
Route::get('/admin/players/{userId}','App\Http\Controller\AdminController@playersAdmin');//Mostrar Players con ulti

/* Player */
Route::get('/player/inventario/items/{userId}','App\Http\Controller\PlayerController@inventarioItems');//inventario de Items
Route::post('/player/add/items','App\Http\Controller\PlayerController@addItem');//Agregar items
Route::post('/player/ataque','App\Http\Controller\PlayerController@ataque');//Ataque