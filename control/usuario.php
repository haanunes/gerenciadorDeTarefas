<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
//validando atributos
if (
        isset($_POST['nome']) && isset($_POST['nome']) != "" &&
        isset($_POST['email']) && isset($_POST['email']) != "" &&
        isset($_POST['id'])
) {
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    if ($usuario->getId() == 0)
        $usuario->setSenha($_POST['senha']);
    $usuario->setId($_POST['id']);
    if ($usuario->getId() == 0) {
        UsuarioDAO::getInstance()->insert($usuario);
    } else {
        UsuarioDAO::getInstance()->update($usuario);
    }
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/usuarioList.php');
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/gerenciadorDeTarefas/usuarioAddEdit.php?erro=true');
    exit;
}
?>