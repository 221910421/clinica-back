<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auxiliar;
use App\Models\Usuarios;
use App\Models\Especialidades;

class AuxiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $auxiliares = Auxiliar::select("id", "usuario_id", "especialidad_id", "matricula")->get();
        return response()->json($auxiliares, 200);
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
            $auxiliar = new Auxiliar();
            $auxiliar->usuario_id = $request->usuario_id;
            $auxiliar->especialidad_id = $request->especialidad_id;
            $auxiliar->matricula = $request->matricula;
            $auxiliar->save();
            return response()->json('Auxiliar creado correctamente', 200);
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
            $auxiliar = Auxiliar::select("id", "usuario_id", "especialidad_id", "matricula")->where('id', $id)->first();
            return response()->json($auxiliar, 200);
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
            $auxiliar = Auxiliar::find($id);
            $auxiliar->usuario_id = $request->usuario_id;
            $auxiliar->especialidad_id = $request->especialidad_id;
            $auxiliar->matricula = $request->matricula;
            $auxiliar->save();
            return response()->json('Auxiliar actualizado correctamente', 200);
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
            $auxiliar = Auxiliar::find($id);
            $auxiliar->delete();
            return response()->json('Auxiliar eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
