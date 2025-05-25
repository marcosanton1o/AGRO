<?php

namespace App\Http\Controllers;

use App\Models\Plantacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlantacaoRequest;
use App\Http\Requests\UpdatePlantacaoRequest;

class PlantacaoController extends Controller
{

    public readonly Plantacao $plantacao;

    public function __construct()
    {
    $this->plantacao = new Plantacao();
    }

    public function index()
{
    $user = Auth::user();

    $plantacoes = $user->plantacoes;

    return view('financas', compact('plantacoes'));
}

    public function create()
    {
        //
    }

    public function store(StorePlantacaoRequest $request)
{
    $created = $this->plantacao->create([
        'plantacoes_users' => Auth::id(),
        'nome' => $request->input('nome'),
        'lucro' => $request->input('lucro'),
        'status' => $request->input('status'),
        'custo_producao' => $request->input('custo_producao'),
    ]);

    return redirect()->route('plantacaoindex')->with('criado', 'Plantação criada com sucesso!');
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
    public function edit($id)
    {
        $plantacao = $this->plantacao->find($id);

        return view('edit', compact('plantacao'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantacaoRequest $request, string $id)
    {
        $updated = $this->plantacao->where('id_plantacao',$id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->route('plantacaoindex')->with('editado', 'editado');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->plantacao->where('id_plantacao', $id)->delete();

        return redirect()->route('plantacaoindex')->with('apagado','apagado');
    }
}
