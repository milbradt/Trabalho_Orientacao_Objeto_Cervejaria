<?php
require_once("banco.php");

class Cerveja extends Banco {


    private $marca;
    private $tipo;
    private $medida;
    private $quantidade;
    private $preco;
    private $data;
    private $ativo;
    private $id;

    //Metodos Set
    public function setMarca($val){
        $this->marca = $val;
    }
    public function setTipo($val){
        $this->tipo = $val;
    }
    public function setMedida($val)
    {
        $this->medida = $val;
    }
    public function setQuantidade($val){
        $this->quantidade = $val;
    }
    public function setPreco($val){
        $this->preco = $val;
    }
    public function setData($val){
        $this->data = $val;
    }
    public function setAtivo($val)
    {
        $this->ativo = $val;
    }
    public function setId($val){
        $this->id = $val;
    }
    //Metodos Get
    public function getMarca(){
        return $this->marca;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getMedida()
    {
        return $this->medida;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getData(){
        return $this->data;
    }
    public function getAtivo()
    {
        return $this->ativo;
    }
    public function getId(){
        return $this->id;
    }

    public function incluir()
    {
        return $this->setCerveja($this->getMarca(), $this->getTipo(), $this->getMedida(), $this->getQuantidade(), $this->getPreco(), $this->getData());
    }
}

?>