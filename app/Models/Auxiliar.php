<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    use HasFactory;

    protected $table = 'auxiliar';

    protected $fillable = [
        'usuario_id',
        'especialidad_id',
        'matricula',
    ];
}
