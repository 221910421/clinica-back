<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $administradores = Administradores::select("id", "usuario_id", "especialidad_id")->get();
        return response()->json($administradores, 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
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
            $administrador = new Administradores();
            $administrador->usuario_id = $request->usuario_id;
            $administrador->especialidad_id = $request->especialidad_id;
            $administrador->save();
            return response()->json('Administrador creado correctamente', 200);
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
        try{
            $administrador = Administradores::select("id", "usuario_id", "especialidad_id")->where('id', $id)->first();
            return response()->json($administrador, 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
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
        try{
            $administrador = Administradores::find($id);
            $administrador->usuario_id = $request->usuario_id;
            $administrador->especialidad_id = $request->especialidad_id;
            $administrador->save();
            return response()->json('Administrador actualizado correctamente', 200);
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
            $administrador = Administradores::find($id);
            $usuarios   = Usuarios::find($administrador->usuario_id);
            $administrador->delete();
            $usuarios->delete();
            return response()->json('Administrador eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
