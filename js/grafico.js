var data;

const options = {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true
        }
    }
};

$.ajax({
    url: './control/graficoTarefasPorUsuarioResponsavel.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        data = response;

        const ctx = document.getElementById('myChart1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    },
    error: function() {
    }
});


$.ajax({
    url: './control/graficoTarefasPorUsuarioCriador.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        data = response;

        // Criar o gráfico com os dados atualizados
        const ctx = document.getElementById('myChart2').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    },
    error: function() {
    }
});

// Fazer a solicitação AJAX para buscar os dados
$.ajax({
    url: './control/graficoSituacaoTarefas.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        data = response;

        const ctx = document.getElementById('myChart3').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    },
    error: function() {
    }
});