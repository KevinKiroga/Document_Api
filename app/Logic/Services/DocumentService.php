<?php

namespace App\Logic\Services;  

use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Logic\Interfaces\DocumentServiceInterface;



class DocumentService implements DocumentServiceInterface
{
    protected $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function getAllDocuments ()
    {
        return $this->documentRepository->getAll();
    }

    public function getDocumentById ($id)
    {
        return $this->documentRepository->getById($id);
    }

    public function deleteDocumentById ($id)
    {
        return $this->documentRepository->deleteById($id);
    }

    public function createDocument (array $data)
    {
        return $this->documentRepository->save($data);
    }
}