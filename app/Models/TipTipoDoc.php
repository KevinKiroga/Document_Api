<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTipoDoc extends Model
{
    use HasFactory;

    protected $table = 'tip_tipo_doc';
    protected $fillable = ['tip_nombre', 'tip_prefijo'];
}
