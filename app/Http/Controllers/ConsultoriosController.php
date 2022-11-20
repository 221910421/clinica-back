<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultorios;

class ConsultoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $consultorios = Consultorios::all();
            return response()->json($consultorios, 200);
        } catch (\Exception $e) {
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
        try {
            $consultorio = new Consultorios();
            $consultorio->doctor_id = $request->doctor_id;
            $consultorio->nombre_consultorio = $request->nombre_consultorio;
            $consultorio->especialidad_id = $request->especialidad_id;
            $consultorio->save();
            return response()->json('Consultorio creado correctamente', 200);
        } catch (\Exception $e) {
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
        //
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
        try {
            $consultorio = Consultorios::find($id);
            $consultorio->doctor_id = $request->doctor_id;
            $consultorio->nombre_consultorio = $request->nombre_consultorio;
            $consultorio->especialidad_id = $request->especialidad_id;
            $consultorio->save();
            return response()->json('Consultorio actualizado correctamente', 200);
        } catch (\Exception $e) {
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
        try {
            $consultorio = Consultorios::find($id);
            $consultorio->delete();
            return response()->json('Consultorio eliminado correctamente', 200);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }
}
