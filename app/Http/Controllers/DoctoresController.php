<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $doctores = Doctores::select("id", "usuario_id", "especialidad", "cedula_profesional")->get();
        return response()->json($doctores, 200);
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
            $doctor = new Doctores();
            $doctor->usuario_id = $request->usuario_id;
            $doctor->especialidad = $request->especialidad;
            $doctor->cedula_profesional = $request->cedula_profesional;
            $doctor->save();
            return response()->json('Doctor creado correctamente', 200);
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
            $doctor = Doctores::select("id", "usuario_id", "especialidad", "cedula_profesional")->where('id', $id)->first();
            return response()->json($doctor, 200);
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
            $doctor = Doctores::find($id);
            $doctor->usuario_id = $request->usuario_id;
            $doctor->especialidad = $request->especialidad;
            $doctor->cedula_profesional = $request->cedula_profesional;
            $doctor->save();
            return response()->json('Doctor actualizado correctamente', 200);
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
            $doctor = Doctores::find($id);
            $doctor->delete();
            return response()->json('Doctor eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
