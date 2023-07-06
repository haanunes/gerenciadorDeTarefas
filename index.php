<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/gerenciadorDeTarefas/components/cabecalho.php";
        ?>
        
        <main>
            <div>
                <p>
                    Este é o index com um pequeno dashboard com 3 gráficos sendo gerados através de jQuery e Ajax.
                </p>
                <p>
                    Caso deseja analisar, os gráficos estão sendo gerados no js/grafico.js e os json são obtidos a partir dos arquivos em control/grafico...
                </p>
            </div>
            <div class="chart-wrapper">
                <div class="chart-container">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </main>

        <script src="js/grafico.js"></script>
    </body>
</html>