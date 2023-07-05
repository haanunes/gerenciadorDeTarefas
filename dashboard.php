<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <?php
  include $_SERVER['DOCUMENT_ROOT']."/gerenciadorDeTarefas/components/cabecalho.php";
  ?>

  <main>
    <div class="chart-container">
      <canvas id="myChart"></canvas>
    </div>
  </main>

  <script src="js/grafico.js"></script>
</body>
</html>