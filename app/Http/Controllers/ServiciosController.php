<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $servicios = Servicios::all();
            return response()->json($servicios, 200);
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
            $servicio = new Servicios();
            $servicio->especialidad_id = $request->especialidad_id;
            $servicio->nombre = $request->nombre;
            $servicio->material = $request->material;
            $servicio->instrumental = $request->instrumental;
            $servicio->save();
            return response()->json('Servicio creado correctamente', 200);
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
            $servicio = Servicios::find($id);
            return response()->json($servicio, 200);
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
            $servicio = Servicios::find($id);
            $servicio->especialidad_id = $request->especialidad_id;
            $servicio->nombre = $request->nombre;
            $servicio->material = $request->material;
            $servicio->instrumental = $request->instrumental;
            $servicio->save();
            return response()->json('Servicio actualizado correctamente', 200);
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
            $servicio = Servicios::find($id);
            $servicio->delete();
            return response()->json('Servicio eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }
}
