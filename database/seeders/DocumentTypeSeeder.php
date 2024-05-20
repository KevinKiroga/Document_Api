<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear registros para la sobrecarga para los tipo de documentos
        $data = [
            ['tip_nombre' => 'Instructivo', 'tip_prefijo' => 'INS'],
            ['tip_nombre' => 'Guia',        'tip_prefijo' => 'G'],
            ['tip_nombre' => 'Ensayo',      'tip_prefijo' => 'ENS'],
            ['tip_nombre' => 'Conferencia', 'tip_prefijo' => 'CONF'],
            ['tip_nombre' => 'Diagramas',   'tip_prefijo' => 'DIAG'],
        ]; 
        
        // Insertar los datos anterior a la tabla
        DB::table('tip_tipo_doc')->insert($data);
    }
}
