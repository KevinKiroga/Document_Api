<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;

use App\Logic\Interfaces\ProcesoServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProcesoController extends Controller
{
    protected $procesoService;

    public function __construct(ProcesoServiceInterface $procesoService)
    {
        $this->procesoService = $procesoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $procesos = $this->procesoService->getAllProcesos();
            return ApiResponse::success('Procesos', 200, $procesos);
        } 
        catch (Exception $e) {
            return ApiResponse::error("Ocurrio un error", 500);
        }
    }

    public function show($id)
    {
        try {
            $proceso = $this->procesoService->getProcesoById($id);
            return ApiResponse::success('Proceso', 200, $proceso);
        } 
        catch (ModelNotFoundException $e) {
            return ApiResponse::error("Ocurrio un error", 404);
        }
    }
}
