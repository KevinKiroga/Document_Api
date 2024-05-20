<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\ProcessRepositoryInterface;
use App\Logic\Interfaces\ProcessServiceInterface;

class ProcessService implements ProcessServiceInterface
{
    protected $procesoRepository;

    public function __construct(ProcessRepositoryInterface $procesoRepository)
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