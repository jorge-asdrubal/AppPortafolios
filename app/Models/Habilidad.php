<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    use HasFactory;
    protected $primaryKey = "id_habilidad";

    protected $table = "habilidades";
    
    protected $fillable = [
        'id_persona',
        'materia',
        'porcentaje'
    ];
}
