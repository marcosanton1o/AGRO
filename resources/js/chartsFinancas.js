document.addEventListener('DOMContentLoaded', function() {
    // Gráfico de Plantações
    new Chart(document.getElementById('plantationsChart'), {
        type: 'bar',
        data: {
            labels: ['Total'],
            datasets: [{
                data: [{{ $quantidadePlantacoes }}],
                backgroundColor: '#8BC34A',
                borderWidth: 0
            }]
        },
        options: chartOptions()
    });

    // Gráfico de Lucro
    new Chart(document.getElementById('profitChart'), {
        type: 'line',
        data: {
            labels: ['Lucro'],
            datasets: [{
                data: [{{ $somaLucro }}],
                borderColor: '#4CAF50',
                backgroundColor: 'rgba(76, 175, 80, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: chartOptions()
    });

    // Gráfico de Custo
    new Chart(document.getElementById('costChart'), {
        type: 'line',
        data: {
            labels: ['Custo'],
            datasets: [{
                data: [{{ $somaCusto }}],
                borderColor: '#F44336',
                backgroundColor: 'rgba(244, 67, 54, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: chartOptions()
    });

    // Gráfico de Crescimento (se houver dados)
    @if($porcentagemAumento !== null)
    new Chart(document.getElementById('growthChart'), {
        type: 'doughnut',
        data: {
            labels: ['Aumento', 'Base'],
            datasets: [{
                data: [
                    Math.abs({{ $porcentagemAumento }}), 
                    100 - Math.abs({{ $porcentagemAumento }})
                ],
                backgroundColor: [
                    {{ $porcentagemAumento >= 0 ? "'#4CAF50'" : "'#F44336'" }},
                    '#EEEEEE'
                ]
            }]
        },
        options: {
            cutout: '70%',
            plugins: { legend: { display: false } }
        }
    });
    @endif
});

function chartOptions() {
    return {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: { enabled: false }
        },
        scales: {
            x: { display: false },
            y: { display: false }
        }
    };
}