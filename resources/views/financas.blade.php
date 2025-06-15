<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/financas.css') }}">
        <link rel="stylesheet" href="{{ asset('css/chartsFinancas.css') }}">
    @endpush

    <div class="pagina" style="margin-left: 260px; margin-top: 50px;">
        <div class="metrics-grid" style="padding-top: 50px; margin-left: 10px; margin-right: 10px;">

            <div class="metric-card">
                <div class="card-icon green">
                    <i class='bx bx-leaf'></i>
                </div>
                <div class="card-content">
                    <h5>Total de Plantações</h5>
                    <p>{{ $quantidadePlantacoes }}</p>
                </div>
            </div>


            <div class="metric-card">
                <div class="card-icon blue">
                    <i class='bx bx-trending-up'></i>
                </div>
                <div class="card-content">
                    <h5>Lucro Total</h5>
                    <p>R$ {{ number_format($somaLucro, 2, ',', '.') }}</p>
                </div>
            </div>


            <div class="metric-card">
                <div class="card-icon orange">
                    <i class='bx bx-trending-down'></i>
                </div>
                <div class="card-content">
                    <h5>Custo Total</h5>
                    <p>R$ {{ number_format($somaCusto, 2, ',', '.') }}</p>
                </div>
            </div>


            <div class="metric-card">
                <div class="card-icon purple">
                    <i class='bx bx-history'></i>
                </div>
                <div class="card-content">
                    <h5>Lucro Anterior</h5>
                    <p>R$ {{ number_format($lucroAnterior, 2, ',', '.') }}</p>
                </div>
            </div>


            <div class="metric-card">
                <div
                    class="card-icon {{ $porcentagemAumento !== null ? ($porcentagemAumento >= 0 ? 'teal' : 'red') : 'gray' }}">
                    <i
                        class='bx {{ $porcentagemAumento !== null ? ($porcentagemAumento >= 0 ? 'bx-up-arrow' : 'bx-down-arrow') : 'bx-line-chart' }}'></i>
                </div>
                <div class="card-content">
                    <h5>Variação</h5>
                    <p>
                        @if ($porcentagemAumento !== null)
                            {{ $porcentagemAumento }}%
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @if (session('criado'))
            <div class="space-y-2 p-4">
                <div role="alert"
                    class="bg-emerald-50 border-l-4 border-emerald-400 text-emerald-800 p-3 rounded-lg flex items-center transition duration-300 ease-in-out hover:bg-emerald-100 transform hover:scale-[1.02]">
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none"
                        class="h-5 w-5 flex-shrink-0 mr-2 text-emerald-500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linejoin="round"
                            stroke-linecap="round"></path>
                    </svg>
                    <p class="text-sm font-medium" style="margin-top: 15px">Plantação criada com sucesso!</p>
                </div>
            </div>
        @endif

        @if (session('editado'))
            <div class=" p-4">
                <div role="alert"
                    class="bg-emerald-50 border-l-4 border-emerald-400 text-emerald-800 p-3 rounded-lg flex items-center transition duration-300 ease-in-out hover:bg-emerald-100 transform hover:scale-[1.02]">
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none"
                        class="h-5 w-5 flex-shrink-0 mr-2 text-emerald-500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linejoin="round"
                            stroke-linecap="round"></path>
                    </svg>
                    <p class="text-sm font-medium" style="margin-top: 15px">Plantação atualizada com sucesso!</p>
                </div>
            </div>
        @endif

        @if (session('apagado'))
            <div class="space-y-2 p-4">
                <div role="alert"
                    class="bg-amber-50 border-l-4 border-amber-400 text-amber-800 p-3 rounded-lg flex items-center transition duration-300 ease-in-out hover:bg-amber-100 transform hover:scale-[1.02]">
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none"
                        class="h-5 w-5 flex-shrink-0 mr-2 text-amber-500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"
                            stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                    <p class="text-sm font-medium" style="margin-top: 15px">Plantação excluída com sucesso!</p>
                </div>
            </div>
        @endif

        <a href="{{ route('createPlantacao') }}" class="button">Adicionar</a>

        <section class="intro rounded">
            <div class="bg-image rounded">

                <div class="mask d-flex align-items-center">
                    <div class="container py-3">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Custo de produção</th>
                                                        <th>Status</th>
                                                        <th>Lucro</th>
                                                        <th>Editar</th>
                                                        <th>Apagar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($plantacoes as $plantacao)
                                                        <tr>
                                                            <td>{{ $plantacao->nome }}</td>
                                                            <td>{{ $plantacao->custo_producao }}</td>
                                                            <td>{{ $plantacao->status }}</td>
                                                            <td>{{ $plantacao->lucro }}</td>
                                                            <td>
                                                                <a href="{{ route('plantacaoedit', ['plantacao' => $plantacao->id_plantacao]) }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    Editar
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('plantacaodelete', ['plantacao' => $plantacao->id_plantacao]) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">
                                                                        Apagar
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

</x-app-layout>
