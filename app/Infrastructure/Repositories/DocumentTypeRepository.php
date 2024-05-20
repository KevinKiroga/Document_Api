<?php

namespace App\Infrastructure\Repositories;


use App\Infrastructure\Interfaces\DocumentTypeRepositoryInterface;
use App\Models\DocumentType;

/**
 * Este repositorio es donde va a ir toda la interaccion con la BD
 */
class DocumentTypeRepository implements DocumentTypeRepositoryInterface
{
    /**
     * Listar todos los tipos de documentos
     */
    public function getAll()
    {
        return DocumentType::all();
    }

    /**
     * Mostrar un tipo de documento especifico
     */
    public function getById($id)
    {
        return DocumentType::findOrFail($id);
    }
}