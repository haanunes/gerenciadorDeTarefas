<?php

/**
 * @author Hélder
 */
class Tarefa {

    private $id;
    private $titulo;
    private $descricao;
    private $dataCriacao;
    private $dataPrazo;
    private $idUsuarioCriador;
    private $idUsuarioResponsavel;
    private $cor;

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getDataPrazo() {
        return $this->dataPrazo;
    }

    public function getIdUsuarioCriador() {
        return $this->idUsuarioCriador;
    }

    public function getIdUsuarioResponsavel() {
        return $this->idUsuarioResponsavel;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function setDataCriacao($dataCriacao): void {
        $this->dataCriacao = $dataCriacao;
    }

    public function setDataPrazo($dataPrazo): void {
        $this->dataPrazo = $dataPrazo;
    }

    public function setIdUsuarioCriador($idUsuarioCriador): void {
        $this->idUsuarioCriador = $idUsuarioCriador;
    }

    public function setIdUsuarioResponsavel($idUsuarioResponsavel): void {
        $this->idUsuarioResponsavel = $idUsuarioResponsavel;
    }

    public function setCor($cor): void {
        $this->cor = $cor;
    }

    //json
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'dataCriacao' => $this->dataCriacao,
            'dataPrazo' => $this->dataPrazo,
            'idUsuarioCriador' => $this->idUsuarioCriador,
            'usuarioCriador' => $this->getUsuarioCriador()->getNome(),
            'idUsuarioResponsavel' => $this->idUsuarioResponsavel,
            'usuarioResponsavel' => $this->getUsuarioResponsavel()->getNome(),
            'cor' => $this->cor
        ];
    }

    //lazyload
    public function getUsuarioCriador(): Usuario {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';
        return UsuarioDAO::getInstance()->getById($this->idUsuarioCriador);
    }

    public function getUsuarioResponsavel(): Usuario {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';
        return UsuarioDAO::getInstance()->getById($this->idUsuarioResponsavel);
    }

}
