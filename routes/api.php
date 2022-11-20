<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;
use App\Models\Usuarios;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\AuxiliaresController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\AuxiliaresEspecialidadesController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\ServiciosController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('usuarios', UsuariosController::class);
    Route::apiResource('especialidades', EspecialidadesController::class);
    Route::apiResource('doctores', DoctoresController::class);
    Route::apiResource('pacientes', PacientesController::class);
    Route::apiResource('citas', CitasController::class);
    Route::apiResource('medicamentos', MedicamentosController::class);
    Route::apiResource('auxiliares', AuxiliaresController::class);
    Route::apiResource('consultorios', ConsultoriosController::class);
    Route::apiResource('administradores', AdministradoresController::class);
    Route::apiResource('servicios', ServiciosController::class);
});

Route::post('/login', function (Request $request) {
    $usuario = Usuarios::where('email', $request->email)->first();

    if ($usuario && Crypt::decryptString($usuario->password) == $request->password) {
        $token = $usuario->createToken('token')->plainTextToken;
        return response()->json(['token' => $token], 200);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
});

Route::post('/register', function (Request $request) {
    try{
    $usuario = new Usuarios();
    $usuario->nombre = $request->nombre;
    $usuario->apellido_paterno = $request->apellido_paterno;
    $usuario->apellido_materno = $request->apellido_materno;
    $usuario->roles = 'Paciente';
    $usuario->email = $request->email;
    $usuario->fecha_nacimiento = $request->fecha_nacimiento;
    $usuario->telefono = $request->telefono;
    $usuario->direccion = $request->direccion;
    $usuario->password = Crypt::encryptString($request->password);
    $usuario->save();
    $token = $usuario->createToken('token')->plainTextToken;
    return response()->json(['token' => $token], 200);
    }catch(\Exception $e){
        return response()->json($e, 500);
    }
});
