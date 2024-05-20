<?php

namespace App\Logic\Interfaces;

interface ProcessServiceInterface 
{
    public function getAllProcesos();
    public function getProcesoById($id);
}