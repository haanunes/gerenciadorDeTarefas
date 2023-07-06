<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
//validando atributos
if (isset($_GET['id']) && $_GET['id'] != 0) {
    UsuarioDAO::getInstance()->delete($_GET['id']);
}
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/usuarioList.php');
exit;
?>