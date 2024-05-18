<?php

namespace App\Logic\Services;

use App\Infrastructure\Repositories\TipoProcesoRepository;
use App\Logic\Interfaces\TipoProcesoServiceInterface;

class TipoProcesoService implements TipoProcesoServiceInterface
{
    protected $tipoProcesoRepository;

    public function __construct(TipoProcesoRepository $tipoProcesoRepository)
    {
        $this->tipoProcesoRepository = $tipoProcesoRepository;
    }

    public function getAllTipoProceso () 
    {
        return $this->tipoProcesoRepository->getAll();
    }
}