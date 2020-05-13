<?php
require_once("banco.php");

class Usuario extends Banco {

    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $ativo;
    private $dataNasc;
    private $id;

    //Metodos Set
    public function setNome($val){
        $this->nome = $val;
    }
    public function setCpf($val){
        $this->cpf = $val;
    }
    public function setEmail($val){
        $this->email = $val;
    }
    public function setSenha($val){
        $this->senha = $val;
    }
    public function setAtivo($val){
        $this->ativo = $val;
    }
    public function setDataNasc($val){
        $this->dataNasc = $val;
    }
    public function setId($val){
        $this->id = $val;
    }
    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getAtivo(){
        return $this->ativo;
    }
    public function getDataNasc(){
        return $this->dataNasc;
    }
    public function getId(){
        return $this->id;
    }

    public function incluir(){
        return $this->setUsuario($this->getNome(),$this->getCpf(),$this->getEmail(),$this->getSenha(),$this->getDataNasc());
    }
}
