<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";

    protected $fillable = [
        "cliente_id",
        "mesa_id",
        "estado_aprobacion",
        "fechaFin",
        "estado",
    ];
}
