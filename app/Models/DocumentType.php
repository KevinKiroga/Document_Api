<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'tip_tipo_doc';
    
    // Campos de esa tabla
    protected $fillable = ['tip_nombre', 'tip_prefijo'];
}
