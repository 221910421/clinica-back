<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamentos;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamentos::paginate();

        return view('medicamentos', compact('medicamentos'))
            ->with('i', (request()->input('page', 1) - 1) * $medicamentos->perPage());
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        $medicamento = new Medicamentos();
        return view('create', compact('medicamento'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        // request()->validate(Medicamentos::$rules);

        $medicamentos = Medicamentos::create($request->all());

        return redirect()->route('medicamentos.index')
            ->with('success', 'actividad creado satisfactoriamente.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        $medicamento = Medicamentos::find($id);

        return view('show', compact('medicamento'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $medicamento = Medicamentos::find($id);

        return view('edit', compact('medicamento'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request $request
    //  * @param  Actividade $actividade
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, Medicamentos $medicamento)
    {
        // request()->validate(Actividade::$rules);

        $medicamento->update($request->all());

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento actualizado correctamente');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    public function destroy($id)
    {
        $medicamento = Medicamentos::find($id)->delete();

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento borrado exitosamente');
    }
}
