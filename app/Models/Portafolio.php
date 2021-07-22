<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    use HasFactory;

    protected $primaryKey = "id_portafolio";

    protected $fillable = [
        'id_user',
        'foto',
        'nombre'
    ];
}
