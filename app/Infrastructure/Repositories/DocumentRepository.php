<?php

namespace App\Infrastructure\Repositories;



use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Models\Document;

/**
 * Este repositorio es donde va a ir toda la interaccion con la BD
 */
class DocumentRepository implements DocumentRepositoryInterface
{
    public function getAll()
    {
        return Document::with('tipo_documento', 'proceso')->get();
    }

    public function getById($id)
    {
        return Document::with('tipo_documento', 'proceso')->findOrFail($id);
    }

    public function deleteById($id)
    {
        $document = Document::findOrFail($id);
        if ($document) 
        {
            $document->delete();
            return true;
        }
        return false;
    }

    public function save(array $data)
    {
        $document = new Document();
        $document->create($data);
        return $document;
    }

    public function update(array $data, $id)
    {
        $document = Document::findOrFail($id);
        $document->update($data);
        return $document;
    }

}
