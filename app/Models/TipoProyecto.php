<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "id_tipo_proyecto";
    protected $table = "tipos_proyectos";

    protected $fillable = [
        'nombre',
        'id_user'
    ];
}
