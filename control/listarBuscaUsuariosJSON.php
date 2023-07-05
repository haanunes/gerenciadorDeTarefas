<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Tarefa.php';

$sql = "";
$parametros = array();
$valores = array();
if (isset($_POST)){
    if (count($_POST)>0){
        $sql.=" where ";
    }
    if (isset($_POST['titulo']) &&  $_POST['titulo']!=""){
        $sql.=" titulo like :titulo and";
        $parametros[]=":titulo";
        $valores[]="%".$_POST['titulo']."%";
    }
    if (isset($_POST['descricao']) &&  $_POST['descricao']!=""){
        $sql.=" descricao like :descricao and";
        $parametros[]=":descricao";
        $valores[]="%".$_POST['descricao']."%";
    }
    if (isset($_POST['dataPrazoInicial'])  && $_POST['dataPrazoInicial']!=""){
        $sql.=" dataPrazo >= :dataPrazoInicial and";
        $parametros[]=":dataPrazoInicial";
        $valores[]=$_POST['dataPrazoInicial'];
    }
    if (isset($_POST['dataPrazoFinal']) &&  $_POST['dataPrazoFinal']!=""){
        $sql.=" dataPrazo <= :dataPrazoFinal and";
        $parametros[]=":dataPrazoFinal";
        $valores[]=$_POST['dataPrazoFinal'];
    }
    if (isset($_POST['dataCriacaoInicial'])&& $_POST['dataCriacaoInicial']!=""){
        $sql.=" dataCriacao >= :dataCriacaoInicial and";
        $parametros[]=":dataCriacaoInicial";
        $valores[]=$_POST['dataCriacaoInicial'];
    }
    if (isset($_POST['dataCriacaoFinal'])&& $_POST['dataCriacaoFinal']!=""){
        $sql.=" dataCriacao <= :dataCriacaoFinal and";
        $parametros[]=":dataCriacaoFinal";
        $valores[]=$_POST['dataCriacaoFinal'];
    }
    if (isset($_POST['idUsuarioCriador']) && $_POST['idUsuarioCriador']!=""){
        $sql.=" idUsuarioCriador = :idUsuarioCriador and";
        $parametros[]=":idUsuarioCriador";
        $valores[]=$_POST['idUsuarioCriador'];
    }
    if (isset($_POST['idUsuarioResponsavel'])  && $_POST['idUsuarioResponsavel']!=""){
        $sql.=" idUsuarioResponsavel = :idUsuarioResponsavel and";
        $parametros[]=":idUsuarioResponsavel";
        $valores[]=$_POST['idUsuarioResponsavel'];
    }
    $sql.=" 1=1";
}
$sql.=" order by dataPrazo desc";
$lista=TarefaDAO::getInstance()->listWhere($sql, $parametros, $valores);
$listaJSON=array();
foreach($lista as $tarefa){
    $listaJSON[]=$tarefa->jsonSerialize();
}
echo json_encode($listaJSON);