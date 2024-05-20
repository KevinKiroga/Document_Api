<?php

namespace App\Infrastructure\Interfaces;

interface TipoDocumentoRepositoryInterface
{
    public function getAll();
    public function getById($id);
}