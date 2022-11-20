<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Axuliar;

class AxuliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $axuliares = Axuliar::all()->get();
            return response()->json($axuliares, 200);
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
            $axuliar = new Axuliar();
            $axuliar->usuario_id = $request->usuario_id;
            $auxiliar->especialidad_id = $request->especialidad_id;
            $auxiliar->matricula = $request->matricula;
            $axuliar->save();
            return response()->json('Axuliar creado correctamente', 200);
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
            $axuliar = Axuliar::where('id', $id)->first();
            return response()->json($axuliar, 200);
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
            $axuliar = Axuliar::where('id', $id)->first();
            $axuliar->usuario_id = $request->usuario_id;
            $auxiliar->especialidad_id = $request->especialidad_id;
            $auxiliar->matricula = $request->matricula;
            $axuliar->save();
            return response()->json('Axuliar actualizado correctamente', 200);
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
            $axuliar = Axuliar::where('id', $id)->first();
            $axuliar->delete();
            return response()->json('Axuliar eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
