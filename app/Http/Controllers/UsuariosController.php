<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::select("id", "nombre", "apellido_paterno", "apellido_materno", "roles", "email", "fecha_nacimiento", "telefono", "direccion")->get();
        return response()->json($usuarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return response()->json('Usuario creado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuarios::select("id", "nombre", "apellido_paterno", "apellido_materno", "roles", "email", "fecha_nacimiento", "telefono", "direccion")->where('id', $id)->first();
        return response()->json($usuario, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'roles' => 'required',
            'email' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
        try{
            Usuarios::where('id', $id)->update($request->all());
            return response()->json('Usuario actualizado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $usuario = Usuarios::find($id);
            $usuario->delete();
            return response()->json('Usuario eliminado exitosamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
