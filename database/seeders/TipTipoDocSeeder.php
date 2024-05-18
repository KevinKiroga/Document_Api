<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipTipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['tip_nombre' => 'Instructivo', 'tip_prefijo' => 'INS'],
            ['tip_nombre' => 'Guia',        'tip_prefijo' => 'G'],
            ['tip_nombre' => 'Ensayo',      'tip_prefijo' => 'ENS'],
            ['tip_nombre' => 'Conferencia', 'tip_prefijo' => 'CONF'],
            ['tip_nombre' => 'Diagramas',   'tip_prefijo' => 'DIAG'],
        ]; 
        
        DB::table('tip_tipo_doc')->insert($data);
    }
}
