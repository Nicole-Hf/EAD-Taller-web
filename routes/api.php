<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfanteController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/children', [InfanteController::class, 'getChildren']);
    Route::get('/children/{id}', [InfanteController::class, 'getKid']);
    Route::get('/area', [AreaController::class, 'getAreas']);
    Route::get('/area/{id}', [AreaController::class, 'getArea']);
});



Route::post('evaluaciones', 'App\Http\Controllers\EvaluacionController@create');
