<?php

namespace App\Infrastructure\Interfaces;

interface DocumentTypeRepositoryInterface
{
    public function getAll();
    public function getById($id);
}