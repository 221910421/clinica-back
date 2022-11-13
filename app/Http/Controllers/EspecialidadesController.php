<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $especialidades = Especialidades::select("id", "nombre")->get();
            return response()->json($especialidades, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
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
            $especialidad = new Especialidades();
            $especialidad->nombre = $request->nombre;
            $especialidad->save();
            return response()->json('La especialidad fue creada correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
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
            $especialidad = Especialidades::find($id);
            return response()->json($especialidad, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
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
            $especialidad = Especialidades::find($id);
            $especialidad->nombre = $request->nombre;
            $especialidad->save();
            return response()->json('La especialidad fue modificada correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
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
            $especialidad = Especialidades::find($id);
            $especialidad->delete();
            return response()->json('La especialidad fue borrada correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}
