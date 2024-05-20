<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\DocumentTypeRepositoryInterface;
use App\Infrastructure\Repositories\DocumentTypeRepository;
use App\Infrastructure\Repositories\TipoDocumentoRepository;
use App\Logic\Interfaces\DocumentServiceInterface;
use App\Logic\Interfaces\DocumentTypeServiceInterface;
use App\Logic\Interfaces\TipoDocumentoServiceInterface;

class DocumentTypeService implements DocumentTypeServiceInterface
{
    protected $tipoProcesoRepository;

    public function __construct(DocumentTypeRepositoryInterface $tipoProcesoRepository)
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