<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear registros para la sobrecarga de los procesos
        $data = [
            ['pro_nombre' => 'Ingeneria',      'pro_prefijo' => 'ING'],
            ['pro_nombre' => 'Biología',       'pro_prefijo' => 'BIO'],
            ['pro_nombre' => 'Arquitectura',   'pro_prefijo' => 'ARQ'],
            ['pro_nombre' => 'Mercadeo',       'pro_prefijo' => 'MER'],
            ['pro_nombre' => 'Ciberseguridad', 'pro_prefijo' => 'CIB'],
        ];

        // Insertar esos datos a la tabla
        DB::table('pro_proceso')->insert($data);
    }
}
