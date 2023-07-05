<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';

$sql = " where email = :email and senha = :senha";
$parametros = array(":email", ":senha");
$valores = array($_POST['email'], $_POST['senha']);

$lista = UsuarioDAO::getInstance()->listWhere($sql, $parametros, $valores);

if (count($lista) > 0) {
    session_start();
    $_SESSION['idUsuarioLogado']=$lista[0]->getId();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/dashboard.php');
    exit;
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/login.php?erro=true');
    exit;
}
?>