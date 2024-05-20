<?php

namespace App\Infrastructure\Interfaces;

interface ProcesoRepositoryInterface
{
    public function getAll();
    public function getById($id);
}