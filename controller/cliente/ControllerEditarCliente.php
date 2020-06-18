<?php
require_once("../../model/banco.php");

class editarControllerCliente {

    private $editar;
    private $nome;
    private $cpf;
    private $dataNasc;
    private $logradouro;
    private $bairro;
    private $cep;
    private $numero;
    private $cidade;
    private $ativo;
    private $id;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id){
        $row = $this->editar->pesquisaCliente($id);
        $this->nome        = $row['nome'];
        $this->cpf         = $row['cpf'];
        $this->dataNasc       = $row['dataNasc'];
        $this->logradouro   = $row['logradouro'];
        $this->bairro        = $row['bairro'];
        $this->cep         = $row['cep'];
        $this->numero         = $row['numero'];
        $this->cidade         = $row['cidade'];
        $this->ativo        = $row['ativo'];
        $this->id           = $row['id'];

    }

    public function editarFormulario($nome,$cpf, $dataNasc,$logradouro,$bairro,$cep,$numero,$cidade,$ativo,$id){
        if($this->editar->updateCliente($nome, $cpf, $dataNasc, $logradouro, $bairro, $cep, $numero, $cidade, $ativo, $id) == TRUE){
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../../view/cliente/tabelaCliente.php'</script>";
        }else{
           echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getDataNasc()
    {
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
    public function getId(){
        return $this->id;
    }
}

$obj = new editarControllerCliente($_GET['id']);
if(isset($_POST['submit'])){
    $obj->editarFormulario($_POST['nome'],$_POST['cpf'],$_POST['dataNasc'],$_POST['logradouro'],$_POST['bairro']
    ,$_POST['cep'],$_POST['numero'],$_POST['cidade'],$_POST['ativo'],$_POST['id']);
}
?>
