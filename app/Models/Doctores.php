<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    use HasFactory;

    protected $table = 'doctores';

    protected $fillable = [
        'usuario_id',
        'especialidad',
        'cedula_profesional',
    ];
}
