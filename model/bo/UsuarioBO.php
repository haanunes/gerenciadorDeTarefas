<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';
class UsuarioBO {

    static function listarUsuariosOrdenadoPorNomeAscendente(){
        $sql = " order by nome asc";
        $arrayDeParametros = array();
        $arrayDeValores = array();
        return UsuarioDAO::getInstance()->listWhere($sql, $arrayDeParametros, $arrayDeValores);
    }
}
