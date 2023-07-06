<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';

$quantidadeTarefasAtrasadas = array();
$quantidadeTarefasComPrazo = array();
$quantidadeTarefasVenceHoje = array();

$restanteDoSQL = " where dataPrazo < NOW() and concluida='Não' ";
$arrayDeParametros = array();
$arrayDeValores = array();
$quantidadeTarefasAtrasadas = count(TarefaDAO::getInstance()->listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores));

$restanteDoSQL = " where dataPrazo = NOW() and concluida='Não' ";
$arrayDeParametros = array();
$arrayDeValores = array();
$quantidadeTarefasVenceHoje = count(TarefaDAO::getInstance()->listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores));

$restanteDoSQL = " where dataPrazo > NOW() and concluida='Não' ";
$arrayDeParametros = array();
$arrayDeValores = array();
$quantidadeTarefasComPrazo = count(TarefaDAO::getInstance()->listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores));

$data = [
    "labels" => ["Atrasadas", "Vence Hoje", "Com Prazo"],
    "datasets" => array([
            "label" => 'Situação de Tarefas NÃO CONCLUÍDAS',
            "data" => array($quantidadeTarefasAtrasadas, $quantidadeTarefasVenceHoje, $quantidadeTarefasComPrazo),
            "backgroundColor" => 'rgba(50, 50, 50, 0.2)',
            "borderColor" => 'rgba(20, 20, 20, 1)',
            "borderWidth" => "1"
        ])
];

echo json_encode($data);
?>
