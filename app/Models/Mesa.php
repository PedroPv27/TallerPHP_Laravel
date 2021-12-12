<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = "mesas";

    protected $fillable = [
        "nombre_mesa",
        "numero_asientos",
        "imagen_mesa",
        "estado",
    ];
}
