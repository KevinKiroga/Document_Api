<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'doc_documento';

    protected $fillable = ['doc_nombre',  'doc_codigo',    'doc_contenido', 'doc_id_proceso', 'doc_id_tipo'];
    protected $hidden =   ['doc_id_tipo', 'doc_id_proceso', 'created_at',   'updated_at'];

    // Un documento solo puede tener un tipo
    public function tipo_documento()
    {
        return $this->belongsTo(DocumentType::class, 'doc_id_tipo', 'id');
    }

    // Un documento debe tener un proceso
    public function proceso()
    {
        return $this->belongsTo(Process::class, 'doc_id_proceso', 'id');
    }
}
