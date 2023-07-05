<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Usuario.php';

class UsuarioDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance(): UsuarioDAO {
        if (!isset(self::$instance))
            self::$instance = new UsuarioDAO();
        return self::$instance;
    }

    public function insert(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuario (nome,email,senha) "
                    . "VALUES (:nome,:email,:senha)";

            $pdo = BDPDO::getInstance();
            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            //a senha já está em MD5
            $p_sql->bindValue(":senha", $usuario->getSenha());
            $p_sql->execute();
            $ultimoId = $pdo->lastInsertId();
            return $ultimoId;
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($usuario) {
        try {
            $sql = "UPDATE usuario SET nome = :nome,"
                    . "email = :email,"
                    . "senha = :senha "
                    . "where id=:id";

            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":senha", md5($usuario->getSenha()));
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from usuario where id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDaBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    private function converterLinhaDaBaseDeDadosParaObjeto($row) {
        $obj = new Usuario;
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setEmail($row['email']);
        $obj->setSenha($row['senha']);
        return $obj;
    }

    public function listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores) {

        try {
            $sql = "SELECT * FROM usuario " . $restanteDoSQL;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for ($i = 0; $i < sizeof($arrayDeParametros); $i++) {
                $p_sql->bindValue($arrayDeParametros[$i], $arrayDeValores[$i]);
            }
            $p_sql->execute();
            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);


            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }

            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde." . $e->getMessage();
        }
    }

    public function listAll() {

        try {
            $sql = "SELECT * FROM usuario ";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->execute();
            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde." . $e->getMessage();
        }
    }
}

?>
