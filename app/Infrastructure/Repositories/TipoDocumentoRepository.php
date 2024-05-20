<?php

namespace App\Infrastructure\Repositories;


use App\Infrastructure\Interfaces\TipoDocumentoRepositoryInterface;
use App\Models\TipTipoDoc;

class TipoDocumentoRepository implements TipoDocumentoRepositoryInterface
{
    public function getAll()
    {
        return TipTipoDoc::all();
    }

    public function getById($id)
    {
        return TipTipoDoc::findOrFail($id);
    }
}