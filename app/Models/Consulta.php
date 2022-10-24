<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'paciente_id',
        'especialidad_id',
        'consultorio_id',
        'fecha_consulta',
        'hora_consulta',
        'motivo_consulta',
        'diagnostico',
        'tratamiento',
        'citas_id',
    ];

}
