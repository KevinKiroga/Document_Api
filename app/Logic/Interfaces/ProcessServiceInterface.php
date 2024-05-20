<?php

namespace App\Logic\Interfaces;

interface ProcessServiceInterface 
{
    public function getAllProcess();
    public function getProcessById($id);
}