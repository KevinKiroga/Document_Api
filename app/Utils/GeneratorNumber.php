<?php

namespace App\Utils;

class GeneratorNumber
{
    /**
     * Metodo para generar numero aleotorio 
     */
    public static function generarNumberRandom ()
    {
        return rand(1, 100);
    } 
}