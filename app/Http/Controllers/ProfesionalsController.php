<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesionals;

class ProfesionalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesionals = Profesionals::all(); //Retornamos todo de la BD tabla profesionals
        return $profesionals;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesional = new Profesionals;
        $profesional->documento = $request->documento;
        $profesional->nombre = $request->nombre;
        $profesional->apellido = $request->apellido;
        $profesional->habilidades = $request->habilidades;
        $profesional->salario = $request->salario;
        $profesional->disponible = 1;
        $profesional->save(); //Guardamos en la base de datos
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
