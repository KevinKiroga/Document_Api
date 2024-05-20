<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\ProcessRepositoryInterface;
use App\Logic\Interfaces\ProcessServiceInterface;

class ProcessService implements ProcessServiceInterface
{
    protected $processRepository;

    public function __construct(ProcessRepositoryInterface $procesoRepositoryI)
    {
        $this->processRepository = $procesoRepositoryI;
    }

    public function getAllProcess () 
    {
        return $this->processRepository->getAll();
    }

    public function getProcessById ($id)
    {
        return $this->processRepository->getById($id);
    }
}