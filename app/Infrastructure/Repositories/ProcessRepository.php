<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\ProcessRepositoryInterface;
use App\Models\Process;

/**
 * Este repositorio es donde va a ir toda la interaccion con la BD
 */
class ProcessRepository implements ProcessRepositoryInterface
{
    /**
     * Listar todos los procesos
     */
    public function getAll()
    {
        return Process::all();
    }

    /**
     * Mostrar un solo proceso
     */
    public function getById($id)
    {
        return Process::findOrFail($id);
    }
}
