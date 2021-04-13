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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profesional = Profesionals::findOrFail($request->id);
        $profesional->documento = $request->documento;
        $profesional->nombre = $request->nombre;
        $profesional->apellido = $request->apellido;
        $profesional->habilidades = $request->habilidades;
        $profesional->salario = $request->salario;
        $profesional->disponible = 1;
        $profesional->update(); //Guardamos en la base de datos
    }

    public function activar(Request $request)
    {
        $profesional = Profesionals::findOrFail($request->id);
        $profesional->disponible = 1;
        $profesional->update(); //Guardamos en la base de datos
    }

    public function desactivar(Request $request)
    {
        $profesional = Profesionals::findOrFail($request->id);
        $profesional->disponible = 0;
        $profesional->update(); //Guardamos en la base de datos
    }

}
