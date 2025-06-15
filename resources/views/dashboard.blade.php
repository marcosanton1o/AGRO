<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endpush

    <div class="pagina">
        <div class="banner" style="border-radius: 20px; overflow: hidden; width: 90%; margin: 0 auto; padding-top: 80px;">
            <img src="{{ asset('storage/banner.png') }}" alt="Banner"
                style="width: 100%; display: block; border-radius: inherit;">
        </div>
        <div class="charts" style="display: flex">
            <div class="lucro-container">
                <i class='bx bx-trending-up lucro-icon'></i>
                <div class="lucro-content">
                    <h3>Lucro Total</h3>
                    <p>R$ {{ number_format($somaLucro, 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="lucro-container">
                <i class='bx bx-leaf lucro-icon'></i>
                <div class="lucro-content">
                    <h3>Total Plantações</h3>
                    <p>{{ $quantidadePlantacoes }}</p>
                </div>
            </div>
               <div class="lucro-container">
                <i class='bx bx-leaf lucro-icon'></i>
                <div class="lucro-content">
                    <h3>Total de produção</h3>
                    <p>R$ {{ number_format($somaCusto, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
