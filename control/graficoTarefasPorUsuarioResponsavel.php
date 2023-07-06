<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';

$listaUsuarios = UsuarioDAO::getInstance()->listWhere(" order by nome asc", array(), array());
$listaQuantidade = array();
$listaNomeUsuario = array();

foreach ($listaUsuarios as $usuario) {
    $restanteDoSQL = " where idUsuarioResponsavel = :idUsuarioResponsavel";
    $arrayDeParametros = array(":idUsuarioResponsavel");
    $arrayDeValores = array($usuario->getId());
    $listaTarefasParaCadasUsuario = TarefaDAO::getInstance()->listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores);
    $listaQuantidade[] = count($listaTarefasParaCadasUsuario);
    $listaNomeUsuario[] = $usuario->getNome();
}
$data = [
    "labels" => $listaNomeUsuario,
    "datasets" =>array( [
        "label" => 'Número de todas as tarefas para cada usuário responsável',
        "data" => $listaQuantidade,
        "backgroundColor" => 'rgba(75, 192, 192, 0.2)',
        "borderColor" => 'rgba(75, 192, 192, 1)',
        "borderWidth" => "1"
    ])
];

echo json_encode($data);
?>
