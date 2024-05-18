<?php

namespace App\Http\Controllers\Api;

use App\BusinessObject\Dtos\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Logic\Interfaces\TipoProcesoServiceInterface;

class TipoProcesoController extends Controller
{
    protected $tipoProcesoService;

    public function __construct(TipoProcesoServiceInterface $tipoProcesoService)
    {
        $this->tipoProcesoService = $tipoProcesoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tipos = $this->tipoProcesoService->getAllTipoProceso();
            return ApiResponse::success('Tipos de Procesos', 200, $tipos);
        } catch (\Exception $e) {
            return ApiResponse::error("Ocurrio un error", 500);
        }
    }
}
