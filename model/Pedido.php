<?php
require_once("banco.php");

class Pedido extends Banco {

    private $id;
    private $clienteId;
    private $mesaId;
    private $valorTotal;
    private $finalizado;
    

    //Metodos Set
    public function setId($val){
        $this->id = $val;
    }
    public function setClienteId($val){
        $this->clienteId = $val;
    }
    public function setMesaId($val){
        $this->mesaId = $val;
    }
    public function setValorTotal($val){
        $this->valorTotal = $val;
    }
    public function setFinalizado($val){
        $this->finalizado = $val;
    }
    
 
    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getClienteId(){
        return $this->clienteId;
    }
    public function getMesaId(){
        return $this->mesaId;
    }

    public function getValorTotal(){
        return $this->valorTotal;
    }
    public function getFinalizado(){
        return $this->finalizado;
    }
    

    public function incluir(){
        return $this->setPedido($this->getId(),$this->getClienteId(),$this->getMesaId(),
        $this->getValorTotal(), $this->getFinalizado());
    }
}
