<?php
require_once("Banco.php");

class Mesa extends Banco {

    private $id;
    private $ocupado;

    //Metodos Set
    public function setId($val){
        $this->id = $val;
    }
    public function setOcupado($val){
        $this->ocupado = $val;
    }


    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getOcupado(){
        return $this->ocupado;
    }



    public function incluir(){
        return $this->setMesa($this->getOcupado());
    }
}
