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

    Route::post('/proovedores', 'ProovedorControlador@crear');
    Route::get('/proovedores/{id}', 'ProovedorControlador@leer');
    Route::put('/proovedores/{id}', 'ProovedorControlador@modificar');
    Route::delete('/proovedores/{id}', 'ProovedorControlador@eliminar');
