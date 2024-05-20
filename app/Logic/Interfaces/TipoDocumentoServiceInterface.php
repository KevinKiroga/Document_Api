<?php

namespace App\Logic\Interfaces;

interface TipoDocumentoServiceInterface
{
    public function getAllTipoProceso();
    public function getTipoProcesoById($id);
}