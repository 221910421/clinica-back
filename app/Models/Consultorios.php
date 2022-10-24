<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorios extends Model
{
    use HasFactory;

    protected $table = 'consultorios';

    protected $fillable = [
        'doctor_id',
        'nombre_consultorio',
        'especialidad_id',
    ];
}
