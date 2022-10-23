<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;
use App\Models\Usuarios;
use App\Http\Controllers\UsuariosController;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('usuarios', UsuariosController::class);
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
    $usuario->roles = $request->roles;
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
