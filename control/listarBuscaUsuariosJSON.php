<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Usuario.php';

$sql = "";
$parametros = array();
$valores = array();
if (isset($_POST)){
    if (count($_POST)>0){
        $sql.=" where ";
    }
    if (isset($_POST['nome']) &&  trim($_POST['nome'])!=""){
        $sql.=" nome like :nome and";
        $parametros[]=":nome";
        $valores[]="%".$_POST['nome']."%";
    }
    if (isset($_POST['email']) &&  trim($_POST['email'])!=""){
        $sql.=" email like :email and";
        $parametros[]=":email";
        $valores[]="%".$_POST['email']."%";
    }
    $sql.=" 1=1";
}
$sql.=" order by nome asc";
$lista=UsuarioDAO::getInstance()->listWhere($sql, $parametros, $valores);
$listaJSON=array();
foreach($lista as $usuario){
    $listaJSON[]=$usuario->jsonSerialize();
}
echo json_encode($listaJSON);