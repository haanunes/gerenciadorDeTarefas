<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Tarefa.php';

class TarefaDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance(): TarefaDAO {
        if (!isset(self::$instance))
            self::$instance = new TarefaDAO();
        return self::$instance;
    }

    public function insert(Tarefa $tarefa) {
        try {
            $sql = "INSERT INTO tarefa (titulo,descricao,dataCriacao,dataPrazo,idUsuarioCriador,idUsuarioResponsavel,cor,concluida) "
                    . "VALUES (:titulo,:descricao,:dataCriacao,:dataPrazo,:idUsuarioCriador,:idUsuarioResponsavel,:cor,:concluida)";

            $pdo = BDPDO::getInstance();
            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(":titulo", $tarefa->getTitulo());
            $p_sql->bindValue(":descricao", $tarefa->getDescricao());
            $p_sql->bindValue(":dataCriacao", $tarefa->getDataCriacao());
            $p_sql->bindValue(":dataPrazo", $tarefa->getDataPrazo());
            $p_sql->bindValue(":idUsuarioCriador", $tarefa->getIdUsuarioCriador());
            $p_sql->bindValue(":idUsuarioResponsavel", $tarefa->getIdUsuarioResponsavel());
            $p_sql->bindValue(":cor", $tarefa->getCor());
            $p_sql->bindValue(":concluida", $tarefa->getConcluida());
            $p_sql->execute();
            $ultimoId = $pdo->lastInsertId();
            return $ultimoId;
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($tarefa) {
        try {
            $sql = "UPDATE tarefa SET titulo = :titulo,"
                    . "descricao = :descricao,"
                    . "dataCriacao = :dataCriacao,"
                    . "dataPrazo = :dataPrazo,"
                    . "idUsuarioCriador = :idUsuarioCriador,"
                    . "idUsuarioResponsavel = :idUsuarioResponsavel, "
                    . "cor = :cor, "
                    . "concluida = :concluida "
                    . "where id=:id";

            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":titulo", $tarefa->getTitulo());
            $p_sql->bindValue(":descricao", $tarefa->getDescricao());
            $p_sql->bindValue(":dataCriacao", $tarefa->getDataCriacao());
            $p_sql->bindValue(":dataPrazo", $tarefa->getDataPrazo());
            $p_sql->bindValue(":idUsuarioCriador", $tarefa->getIdUsuarioCriador());
            $p_sql->bindValue(":idUsuarioResponsavel", $tarefa->getIdUsuarioResponsavel());
            $p_sql->bindValue(":cor", $tarefa->getCor());
            $p_sql->bindValue(":concluida", $tarefa->getConcluida());
            $p_sql->bindValue(":id", $tarefa->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from tarefa where id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM tarefa WHERE id = :id";
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
        $obj = new Tarefa;
        $obj->setId($row['id']);
        $obj->setTitulo($row['titulo']);
        $obj->setDescricao($row['descricao']);
        $obj->setDataCriacao($row['dataCriacao']);
        $obj->setDataPrazo($row['dataPrazo']);
        $obj->setIdUsuarioCriador($row['idUsuarioCriador']);
        $obj->setIdUsuarioResponsavel($row['idUsuarioResponsavel']);
        $obj->setCor($row['cor']);
        $obj->setConcluida($row['concluida']);
        return $obj;
    }

    public function listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores) {

        try {
            $sql = "SELECT * FROM tarefa " . $restanteDoSQL;
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
            print "Ocorreu um erro ao tentar executar esta ação de listwere(".$restanteDoSQL.")" . $e->getMessage();
        }
    }

    public function listAll() {

        try {
            $sql = "SELECT * FROM tarefa ";
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
