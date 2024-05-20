<?php

namespace App\Infrastructure\Interfaces;

interface DocumentRepositoryInterface
{
    // Se definen los metodos para los repositorios
    public function getAll();
    public function getById($id);
    public function deleteById($id);
    public function save(array $data);
    public function update (array $data, $id);
}