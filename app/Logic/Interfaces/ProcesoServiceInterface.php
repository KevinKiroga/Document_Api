<?php

namespace App\Logic\Interfaces;

interface ProcesoServiceInterface
{
    public function getAllProcesos();
    public function getProcesoById($id);
}