<?php

namespace App\Infrastructure\Interfaces;

interface ProcessRepositoryInterface 
{
    public function getAll();
    public function getById($id);
}