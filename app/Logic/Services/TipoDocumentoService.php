<?php

namespace App\Logic\Services;

use App\Infrastructure\Repositories\TipoDocumentoRepository;
use App\Logic\Interfaces\TipoDocumentoServiceInterface;

class TipoDocumentoService implements TipoDocumentoServiceInterface
{
    protected $tipoProcesoRepository;

    public function __construct(TipoDocumentoRepository $tipoProcesoRepository)
    {
        $this->tipoProcesoRepository = $tipoProcesoRepository;
    }

    public function getAllTipoProceso () 
    {
        return $this->tipoProcesoRepository->getAll();
    }

    public function getTipoProcesoById ($id) 
    {
        return $this->tipoProcesoRepository->getById($id);
    }
}