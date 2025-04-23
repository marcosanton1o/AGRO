<?php

namespace App\Http\Controllers;

use App\Models\plantacao;
use Illuminate\Http\Request;

class PlantacaoController extends Controller
{

    public readonly Plantacao $plantacao;

    public function __construct()
    {
    $this->planatacao = new Plantacao();
    }

    public function index()
    {
        return view('');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(plantacao $plantacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plantacao $plantacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, plantacao $plantacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plantacao $plantacao)
    {
        //
    }
}
