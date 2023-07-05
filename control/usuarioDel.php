<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Tarefa.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
//validando atributos
if (isset($_GET['id']) && $_GET['id'] != 0) {
    TarefaDAO::getInstance()->delete($_GET['id']);
}
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/tarefalist.php');
exit;
?>