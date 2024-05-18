<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DocumentoController;
use App\Http\Controllers\Api\ProcesoController;
use App\Http\Controllers\Api\TipoProcesoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*Route::get('/user', function (Request $request) {
    return $request->user();
});*/

// Ruta para la API de logueo
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::resource('documento', DocumentoController::class);
    Route::get('proceso', [ProcesoController::class, 'index']);
    Route::get('tipo', [TipoProcesoController::class, 'index']);

    // Ruta para la API de cerrar sesion
    Route::get('/logout', [AuthController::class, 'logout']);
});
