<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $citas = Citas::select("id", "fecha_cita", "hora_cita", "paciente_id", "especialidad_id")->get();
            return response()->json($citas, 200);
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
            $cita = new Citas();
            $cita->fecha_cita = $request->fecha_cita;
            $cita->hora_cita = $request->hora_cita;
            $cita->paciente_id = $request->paciente_id;
            $cita->especialidad_id = $request->especialidad_id;
            $cita->save();
            return response()->json('Cita creada correctamente', 200);
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
            $cita = Citas::select("id", "fecha_cita", "hora_cita", "paciente_id", "especialidad_id")->where('id', $id)->first();
            return response()->json($cita, 200);
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
            $cita = Citas::find($id);
            $cita->fecha_cita = $request->fecha_cita;
            $cita->hora_cita = $request->hora_cita;
            $cita->paciente_id = $request->paciente_id;
            $cita->especialidad_id = $request->especialidad_id;
            $cita->save();
            return response()->json('Cita actualizada correctamente', 200);
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
            $cita = Citas::find($id);
            $cita->delete();
            return response()->json('Cita eliminada correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
