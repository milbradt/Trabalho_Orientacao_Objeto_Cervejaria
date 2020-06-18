<?php
require_once("Banco.php");

class Usuario extends Banco 
{

    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $dataNasc;
    private $admin;
    
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

    public function setAdmin($val){
        $this->admin = $val;
    }    

    public function setDataNasc($val){
        $this->dataNasc = $val;
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

    public function getAdmin(){
        return $this->admin;
    }

    public function getDataNasc(){
        return $this->dataNasc;
    }

    public function incluir(){
        return $this->setUsuario($this->getNome(),$this->getCpf(),$this->getEmail(),$this->getSenha(),$this->getDataNasc(),$this->getAdmin());
    }

}