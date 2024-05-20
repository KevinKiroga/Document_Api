<?php

namespace App\Logic\Interfaces;

interface DocumentServiceInterface
{
    // Se definen los metodos para los servicios
    public function getAllDocuments();
    public function getDocumentById($id);
    public function deleteDocumentById($id);
    public function createDocument(array $data);
    public function updateDocument(array $data, $id);
}