<?php

class BDPDO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instancia)) {
            self::$instance = new PDO('mysql:host=db;'
                    . 'dbname=gerenciadordetarefas', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        return self::$instance;
    }

}
