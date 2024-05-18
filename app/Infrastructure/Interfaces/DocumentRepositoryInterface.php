<?php

namespace App\Infrastructure\Interfaces;

interface DocumentRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function deleteById($id);
    public function save(array $data);
}