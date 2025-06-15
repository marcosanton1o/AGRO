<x-app-layout>
    <div class="pagina">
        @push('styles')
            <link rel="stylesheet" href="{{ asset('css/createPlantacao.css') }}">
        @endpush
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="conteinerCreate">
                <form action="{{ route('plantacaoupdate', ['plantacao' => $plantacao->id_plantacao]) }}"
                    method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div>
                        <x-input-label for="nome" :value="__('Nome da plantação')" />
                        <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome"
                            value="{{ $plantacao->nome }}" required />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="custo_producao" :value="__('Custo de Produção')" />
                        <x-text-input id="custo_producao" class="block mt-1 w-full" type="number" step="0.01"
                            name="custo_producao" value="{{ $plantacao->custo_producao }}" required />
                        <x-input-error :messages="$errors->get('custo_producao')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="block mt-1 w-full" required>
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Selecione o Status
                            </option>
                            <option value="1" {{ $plantacao->status == 1 ? 'selected' : '' }}>Vendido</option>
                            <option value="2" {{ $plantacao->status == 2 ? 'selected' : '' }}>Em crescimento
                            </option>
                            <option value="3" {{ $plantacao->status == 3 ? 'selected' : '' }}>Colhido</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lucro" :value="__('Lucro')" />
                        <x-text-input id="lucro" class="block mt-1 w-full" type="number" step="0.01"
                            name="lucro" value="{{ $plantacao->lucro }}" required />
                        <x-input-error :messages="$errors->get('lucro')" class="mt-2" />
                    </div>

                    <div class="flex justify-center">
                        <button id="butao" type="submit" class="px-4 py-2 my-3  bg-blue-600 rounded">
                            Editar Plantação
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
