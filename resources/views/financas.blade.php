<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form class="mt-5" action="{{ route('plantacaostore') }}" method="post">
        @csrf

        <div>
            <x-input-label for="nome" class="text-white" :value="__('Nome da plantação')" />
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" value="{{ old('nome') }}" required />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="custo_producao" class="text-white" :value="__('Custo de Produção')" />
            <x-text-input id="custo_producao" class="block mt-1 w-full" type="number" step="0.01" name="custo_producao" value="{{ old('custo_producao') }}" required />
            <x-input-error :messages="$errors->get('custo_producao')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="status" class="text-white" :value="__('Status')" />
            <select id="status" name="status" class="block mt-1 w-full" required>
                <option value="" disabled {{ old('status') ? '' : 'selected' }}>Selecione o Status</option>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Vendido</option>
                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Em crescimento</option>
                <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Colhido</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="lucro" class="text-white" :value="__('Lucro')" />
            <x-text-input id="lucro" class="block mt-1 w-full" type="number" step="0.01" name="lucro" value="{{ old('lucro') }}" required />
            <x-input-error :messages="$errors->get('lucro')" class="mt-2" />
        </div>

        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 my-3 text-white bg-blue-600 rounded">
                Criar Plantação
            </button>
        </div>
    </form>
</div>

@foreach ($plantacoes as $plantacao)
    {{ $plantacao->nome }} |
    <a href="{{ route('plantacaoedit', ['plantacao' => $plantacao->id_plantacao]) }}">Editar</a>

<form action="{{ route('plantacaodelete', ['plantacao' => $plantacao->id_plantacao]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded ">Apagar</button>
</form>
@endforeach
<div>
    <h3>Total de Plantação: {{ $quantidadePlantacoes }}</h3>
    <h3>Soma do Lucro: {{ $somaLucro }}</h3>
    <h3>Soma do Custo de Produção: {{ $somaCusto }}</h3>
    <h3>Lucro Anterior: {{ $lucroAnterior }}</h3>
    @if ($porcentagemAumento !== null)
        <h3>Porcentagem de Aumento: {{ $porcentagemAumento }}%</h3>
    @else
        <h3>Não há dados suficientes para calcular a porcentagem de aumento.</h3>
    @endif
</div>
            </div>
        </div>
    </div>
</x-app-layout>
