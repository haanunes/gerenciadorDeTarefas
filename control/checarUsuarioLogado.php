<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';

function checarUsuarioLogado() {
    session_start();
    if (!isset($_SESSION['idUsuarioLogado'])) {
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/gerenciadorDeTarefas/login.php');
        exit;
    }
}

checarUsuarioLogado();
?>