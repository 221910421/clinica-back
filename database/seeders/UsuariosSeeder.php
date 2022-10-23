<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Administrador',
            'apellido_paterno' => 'Administrador',
            'apellido_materno' => 'Administrador',
            'roles' => 'administrador',
            'email' => 'admin@localhost',
            'fecha_nacimiento' => '2021-10-23',
            'telefono' => '0000000000',
            'direccion' => 'Calle 1, Colonia 1, Ciudad 1, Estado 1, País 1',
            'password' => Crypt::encryptString('admin'),
        ]);
    }
}
