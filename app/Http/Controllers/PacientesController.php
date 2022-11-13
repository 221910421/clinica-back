<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $pacientes = Pacientes::select("id", "usuario_id", "fecha_nacimiento", "sexo", "telefono", "direccion", "estado_civil", "ocupacion", "alergias", "enfermedades", "medicamentos", "cirugias", "peso", "estatura", "tipo_sangre")->get();
        return response()->json($pacientes, 200);
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
            $paciente = new Pacientes();
            $paciente->usuario_id = $request->usuario_id;
            $paciente->sexo = $request->sexo;
            $paciente->alergias = $request->alergias;
            $paciente->enfermedades = $request->enfermedades;
            $paciente->medicamentos = $request->medicamentos;
            $paciente->peso = $request->peso;
            $paciente->estatura = $request->estatura;
            $paciente->tipo_sangre = $request->tipo_sangre;
            $paciente->save();
            return response()->json('Paciente creado correctamente', 200);
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
            $paciente = Pacientes::select("id", "usuario_id", "fecha_nacimiento", "sexo", "telefono", "direccion", "estado_civil", "ocupacion", "alergias", "enfermedades", "medicamentos", "cirugias", "peso", "estatura", "tipo_sangre")->where('id', $id)->first();
            return response()->json($paciente, 200);
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
            $paciente = Pacientes::find($id);
            $paciente->usuario_id = $request->usuario_id;
            $paciente->sexo = $request->sexo;
            $paciente->alergias = $request->alergias;
            $paciente->enfermedades = $request->enfermedades;
            $paciente->medicamentos = $request->medicamentos;
            $paciente->peso = $request->peso;
            $paciente->estatura = $request->estatura;
            $paciente->tipo_sangre = $request->tipo_sangre;
            $paciente->save();
            return response()->json('Paciente actualizado correctamente', 200);
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
            $paciente = Pacientes::find($id);
            $paciente->delete();
            return response()->json('Paciente eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
