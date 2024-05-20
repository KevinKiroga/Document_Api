<?php

namespace App\Logic\Interfaces;

interface DocumentTypeServiceInterface
{
    public function getAllTipoProceso();
    public function getTipoProcesoById($id);
}