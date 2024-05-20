<?php

namespace App\Logic\Interfaces;

interface DocumentTypeServiceInterface
{
    public function getAllDocumentType();
    public function getDocumentTypeById($id);
}