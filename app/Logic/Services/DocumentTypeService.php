<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\DocumentTypeRepositoryInterface;
use App\Logic\Interfaces\DocumentTypeServiceInterface;


class DocumentTypeService implements DocumentTypeServiceInterface
{
    protected $documentTypeRepository;

    public function __construct(DocumentTypeRepositoryInterface $tipoProcesoRepositoryI)
    {
        $this->documentTypeRepository = $tipoProcesoRepositoryI;
    }

    public function getAllDocumentType () 
    {
        return $this->documentTypeRepository->getAll();
    }

    public function getDocumentTypeById ($id) 
    {
        return $this->documentTypeRepository->getById($id);
    }
}