<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = "id_persona";

    protected $fillable = [
        'nombre',
        'apellido',
        'celular',
        'correo_electronico',
        'foto',
        'biografia',
        'hoja_vida'
    ];
}
