<?php

namespace App\Http\Controllers;

use App\Tecnico;
use Illuminate\Http\Request;

class TecnicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnicos = Tecnico::all();
        //dd($tecnicos[0]->portal);
        return view('tecnicos.tecnicos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tecnico  $Tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $Tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnico  $Tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $Tecnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tecnico  $Tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnico $Tecnico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnico  $Tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $Tecnico)
    {
        //
    }
}
