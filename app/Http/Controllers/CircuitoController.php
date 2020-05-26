<?php

namespace App\Http\Controllers;

use App\Bloque;
use App\Circuito;
use Illuminate\Http\Request;

class CircuitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $circuitos = Circuito::all();

        return view('index', [
            'circuitos' => $circuitos
        ]);
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
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function show(Circuito $circuito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function edit(Circuito $circuito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circuito $circuito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circuito $circuito)
    {
        //
    }
}
