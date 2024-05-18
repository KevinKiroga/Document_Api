<?php

namespace App\Logic\Interfaces;

interface DocumentServiceInterface
{
    public function getAllDocuments();
    public function getDocumentById($id);
    public function deleteDocumentById($id);
    public function createDocument(array $data);
}