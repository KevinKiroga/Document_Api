<?php

namespace App\Infrastructure\Repositories;


use App\Infrastructure\Interfaces\TipoProcesoRepositoryInterface;
use App\Models\TipTipoDoc;

class TipoProcesoRepository implements TipoProcesoRepositoryInterface
{
    public function getAll()
    {
        return TipTipoDoc::all();
    }
}