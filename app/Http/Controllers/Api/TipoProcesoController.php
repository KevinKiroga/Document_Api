<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Logic\Interfaces\TipoDocumentoServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoProcesoController extends Controller
{
    protected $tipoProcesoService;

    public function __construct(TipoDocumentoServiceInterface $tipoProcesoService)
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

    public function show($id)
    {
        try {
            $tipoProceso = $this->tipoProcesoService->getTipoProcesoById($id);
            return ApiResponse::success('Tipo de Proceso', 200, $tipoProceso);
        } catch (ModelNotFoundException $e) { {
                return ApiResponse::error("Ocurrio un error", 404);
            }
        }
    }
}
