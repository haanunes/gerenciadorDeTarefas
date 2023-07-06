<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';

$listaUsuarios = UsuarioDAO::getInstance()->listWhere(" order by nome asc", array(), array());
$listaQuantidade = array();
$listaNomeUsuario = array();

foreach ($listaUsuarios as $usuario) {
    $restanteDoSQL = " where idUsuarioCriador = :idUsuarioCriador";
    $arrayDeParametros = array(":idUsuarioCriador");
    $arrayDeValores = array($usuario->getId());
    $listaTarefasParaCadasUsuario = TarefaDAO::getInstance()->listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores);
    $listaQuantidade[] = count($listaTarefasParaCadasUsuario);
    $listaNomeUsuario[] = $usuario->getNome();
}
$data = [
    "labels" => $listaNomeUsuario,
    "datasets" =>array( [
        "label" => 'Número de todas as tarefas para cada usuário criador',
        "data" => $listaQuantidade,
        "backgroundColor" => 'rgba(200, 20, 20, 0.2)',
        "borderColor" => 'rgba(200, 10, 10, 1)',
        "borderWidth" => "1"
    ])
];

echo json_encode($data);
?>
