<?php

namespace App\Http\Controllers;

use App\Models\plantacao;
use Illuminate\Http\Request;
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
        $plantID = Auth::id();

        $plantacoes = User::where('plantacoes_users', $plantID)->with('plantacoes')->get();

        $quantidadePlantacoes = Plantacao::where('plantacoes_users', auth()->id())->count();

        $somaLucro = Plantacao::where('plantacoes_users', Auth::id())
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('lucro');

        $lucroAnterior = Plantacao::where('plantacoes_users', $userId)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->whereYear('created_at', Carbon::now()->subMonth()->year)
        ->sum('lucro');

        if ($lucroAnterior > 0) {
            $porcentagemAumento = (($lucroAtual - $lucroAnterior) / $lucroAnterior) * 100;
        } else {
            $porcentagemAumento = null;
        }

        return view('financas', compact('plantacoes','somaLucro','quantidadePlantacoes','lucroAnterior','porcentagemAumento'));
    }

    public function create()
    {
        //
    }

    public function store(StorePlantacaoRequest $request)
    {
        $created = $this->plantacao->create([
            'nome' => $request->input('nome'),
            'lucro' => $request->input('lucro'),
            'status' => $request->input('status'),
            'custo_producao' => $request->input('custo_producao'),
            'plantacoes_users' => Auth::id(),
        ]);
if($created){
        return redirect()->route('plantacaoindex')->with('criado', 'criado');
}
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
    public function update(UpdatePlantacaoRequest $request, $id)
    {
        $updated=$this->plantacao->where('id_plantacao',$id)->update($request->except(['_token','_method']));

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

        return redirect()->route('avisoindex')->with('apagado','apagado');;
    }
}
