<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\ProcesoRepositoryInterface;
use App\Logic\Interfaces\ProcesoServiceInterface;

class ProcesoService implements ProcesoServiceInterface
{
    protected $procesoRepository;

    public function __construct(ProcesoRepositoryInterface $procesoRepository)
    {
        $this->procesoRepository = $procesoRepository;
    }

    public function getAllProcesos () 
    {
        return $this->procesoRepository->getAll();
    }

    public function getProcesoById ($id)
    {
        return $this->procesoRepository->getById($id);
    }
}