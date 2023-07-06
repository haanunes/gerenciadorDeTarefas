<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Tarefa.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
//validando atributos
if (
        isset($_POST['titulo']) && isset($_POST['titulo']) != "" &&
        isset($_POST['descricao']) && isset($_POST['descricao']) != "" &&
        isset($_POST['dataPrazo']) && isset($_POST['dataPrazo']) != "" &&
        isset($_POST['cor']) && isset($_POST['cor']) != "" &&
        isset($_POST['idUsuarioResponsavel']) && isset($_POST['idUsuarioResponsavel']) != "" &&
        isset($_POST['id'])
) {
    $tarefa = new Tarefa();
    $tarefa->setCor($_POST['cor']);
    $tarefa->setDataCriacao(date("Y-m-d", time()));
    $tarefa->setDataPrazo($_POST['dataPrazo']);
    $tarefa->setDescricao($_POST['descricao']);
    $tarefa->setId($_POST['id']);
    $tarefa->setTitulo($_POST['titulo']);
    $tarefa->setIdUsuarioResponsavel($_POST['idUsuarioResponsavel']);
    $tarefa->setIdUsuarioCriador($_SESSION['idUsuarioLogado']);
    $tarefa->setConcluida($_POST['concluida']);
    if ($tarefa->getId() == 0) {
        TarefaDAO::getInstance()->insert($tarefa);
    } else {
        TarefaDAO::getInstance()->update($tarefa);
    }
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/tarefaList.php');
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/tarefaAddEdit.php?erro=true');
    exit;
}
?>