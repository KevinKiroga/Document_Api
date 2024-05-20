<?php

namespace App\Infrastructure\Repositories;



use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Models\DocDocumento;

class DocumentRepository implements DocumentRepositoryInterface
{
    public function getAll()
    {
        return DocDocumento::with('tipo_documento', 'proceso')->get();
    }

    public function getById($id)
    {
        return DocDocumento::with('tipo_documento', 'proceso')->findOrFail($id);
    }

    public function deleteById($id)
    {
        $document = DocDocumento::findOrFail($id);
        if ($document) {
            $document->delete();
            return true;
        }
        return false;
    }

    public function save(array $data)
    {
        $document = new DocDocumento();
        $document->create($data);
        return $document;
    }

    public function update(array $data, $id)
    {
        $document = DocDocumento::findOrFail($id);
        $document->update($data);
        return $document;
    }

}
