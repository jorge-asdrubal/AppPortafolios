<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "id_proyecto";
    protected $fillable = [
        'nombre',
        'imagen',
        'url',
        'id_tipo_proyecto',
        'descripcion',
        'id_user'
    ];
}
