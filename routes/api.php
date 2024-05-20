<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DocumentController;

use App\Http\Controllers\Api\DocumentTypeController;
use App\Http\Controllers\Api\ProcessController;
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


// Ruta para la API de loguear un usuairo
Route::post('/login', [AuthController::class, 'login']);

/**
 * Grupo de rutas protegida restringiendo el acceso 
 * si el usuario no se ha logueado
 */
Route::middleware('auth:sanctum')->group(function () {

    // Ruta para la API del CRUD de un documento
    Route::apiResource('documento', DocumentController::class);

    // Ruta para la API para obtener y mostrar los proceso
    Route::get('proceso', [ProcessController::class, 'index']);
    Route::get('proceso/{id}', [ProcessController::class, 'show']);

    // Ruta para la API para obtener y mostrar los tipos de documentos
    Route::get('tipo', [DocumentTypeController::class, 'index']);
    Route::get('tipo/{id}', [DocumentTypeController::class, 'show']);


    // Ruta para la API de cerrar sesion
    Route::get('/logout', [AuthController::class, 'logout']);
});
