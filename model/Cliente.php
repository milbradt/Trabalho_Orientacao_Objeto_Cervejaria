<?php
require_once("banco.php");

class Cliente extends Banco {

    private $id;
    private $nome;
    private $cpf;
    private $dataNasc;
    private $logradouro;
    private $bairro;
    private $cep;
    private $numero;
    private $cidade;
    private $ativo;
    

    //Metodos Set
    public function setId($val){
        $this->id = $val;
    }
    public function setNome($val){
        $this->nome = $val;
    }
    public function setCpf($val){
        $this->cpf = $val;
    }
    public function setDataNasc($val){
        $this->dataNasc = $val;
    }
    public function setLogradouro($val){
        $this->logradouro = $val;
    }
    public function setBairro($val){
        $this->bairro = $val;
    }
    public function setCep($val){
        $this->cep = $val;
    }
    public function setNumero($val){
        $this->numero = $val;
    }
    public function setCidade($val){
        $this->cidade = $val;
    }
    public function setAtivo($val){
        $this->ativo = $val;
    }
 
    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getDataNasc(){
        return $this->dataNasc;
    }
    public function getLogradouro(){
        return $this->logradouro;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getAtivo(){
        return $this->ativo;
    }



    public function incluir(){
        return $this->setCliente($this->getNome(),$this->getCpf(),$this->getDataNasc(),$this->getLogradouro(),
        $this->getBairro(), $this->getCep(), $this->getNumero(), $this->getCidade(), $this->getAtivo());
    }
}
