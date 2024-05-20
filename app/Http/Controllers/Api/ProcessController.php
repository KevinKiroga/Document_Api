<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;

use App\Logic\Interfaces\ProcessServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProcessController extends Controller
{
    // Variable para ser intermedario y llamar los metodos de la interfaz del servicio
    protected $processService;

    // Inyeccion de dependencias
    public function __construct(ProcessServiceInterface $processServiceI)
    {
        $this->processService = $processServiceI;
    }

    /**
     * Listar todos los procesos
     */
    public function index()
    {
        // Manejo de Errores
        try {
            // Listar todos los procesos
            $process = $this->processService->getAllProcesos();

            // Devuelve JSON 200
            return ApiResponse::success('Procesos', 200, $process);
        } 
        catch (Exception $e) {
            // Devuelve JSON 500
            return ApiResponse::error("Ocurrio un error", 500);
        }
    }

    /**
     * Mostrar un proceso
     */
    public function show($id)
    {
        // Manejo de Errores
        try {
            $process = $this->processService->getProcesoById($id);

            // Devuelve JSON 200
            return ApiResponse::success('Proceso', 200, $process);
        } 
        catch (ModelNotFoundException $e) {

            // Devuelve JSON 404
            return ApiResponse::error("Ocurrio un error", 404);
        }
    }
}
