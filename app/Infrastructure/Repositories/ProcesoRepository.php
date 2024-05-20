<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\ProcesoRepositoryInterface;
use App\Models\ProProceso;

class ProcesoRepository implements ProcesoRepositoryInterface
{
    public function getAll()
    {
        return ProProceso::all();
    }

    public function getById($id)
    {
        return ProProceso::findOrFail($id);
    }
}