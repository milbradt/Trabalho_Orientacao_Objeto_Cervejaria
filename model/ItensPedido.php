<?php
require_once("Banco.php");

class Usuario extends Banco {

    private $id;
    private $cervejaId;
    private $pedidoId;
    

    //Metodos Set
    public function setId($val){
        $this->id = $val;
    }
    public function setCervejaId($val){
        $this->cervejaId = $val;
    }
    public function setPedidoId($val){
        $this->pedidoId = $val;
    }


    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getCervejaId(){
        return $this->cervejaId;
    }
    public function getPedidoId(){
        return $this->pedidoId;
    }



    public function incluir(){
        return $this->setItensPedido($this->getCervejaId(),$this->getPedidoId());
    }
}
