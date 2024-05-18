<?php

namespace App\Http\Controllers\Api;

use App\BusinessObject\Dtos\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Logic\Interfaces\ProcesoServiceInterface;
use Exception;

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
}
