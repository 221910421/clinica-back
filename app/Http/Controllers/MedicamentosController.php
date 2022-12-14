<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamentos;
use Illuminate\Database\Eloquent\Collection;
use Http;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $medicamentos = Medicamentos::select("id", "nombre", "clasificacion", "presentacion", "dosis")->get();
            return response()->json(['success' => "true", 'response'=>$medicamentos], 202);
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
            $medicamento = new Medicamentos();
            $medicamento->nombre = $request->nombre;
            $medicamento->clasificacion = $request->clasificacion;
            $medicamento->presentacion = $request->presentacion;
            $medicamento->dosis = $request->dosis;
            $medicamento->save();
            return response()->json(['success' => "true"], 200);
        }catch(\Exception $e){
            return response()->json($medicamento, 500);
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
            $medicamento = Medicamentos::select("id", "nombre", "clasificacion", "presentacion", "dosis")->where('id', $id)->first();
            return response()->json(['success' => "true", 'response'=>$medicamento], 202);
        }catch(\Exception $e){
            return response()->json($e, 500);
            // return view('welcome');
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
            $medicamento = Medicamentos::find($id);
            $medicamento->nombre = $request->nombre;
            $medicamento->clasificacion = $request->clasificacion;
            $medicamento->presentacion = $request->presentacion;
            $medicamento->dosis = $request->dosis;
            $medicamento->save();
            return response()->json('Medicamento actualizado correctamente', 200);
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
            $medicamento = Medicamentos::find($id);
            $medicamento->delete();
            return response()->json('Medicamento eliminado correctamente', 200);
        }catch(\Exception $e){
            return response()->json($e, 500);
        }
    }

    public function _construct(){
        $this->middleware('auth');
    }


    
}
