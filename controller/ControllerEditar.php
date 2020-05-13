<?php
require_once("../model/banco.php");

class editarController {

    private $editar;
    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $data;
    private $ativo;
    private $id;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id){
        $row = $this->editar->pesquisaLivro($id);
        $this->nome         = $row['nome'];
        $this->autor        = $row['autor'];
        $this->quantidade   = $row['quantidade'];
        $this->preco        = $row['preco'];
        $this->data         = $row['data'];
        $this->ativo        = $row['ativo'];
        $this->id           = $row['id'];

    }

    public function editarFormulario($nome,$autor,$quantidade,$preco,$data,$ativo,$id){
        if($this->editar->updateLivro($nome,$autor,$quantidade,$preco,$ativo,$data,$id) == TRUE){
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getNome(){
        return $this->nome;
    }
    public function getAutor(){
        return $this->autor;
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
    public function getAtivo(){
        return $this->ativo;
    }
    public function getId(){
        return $this->id;
    }
}

$obj = new editarController($_GET['id']);
if(isset($_POST['submit'])){
    $obj->editarFormulario($_POST['nome'],$_POST['autor'],$_POST['quantidade'],$_POST['preco'],$_POST['data'],$_POST['ativo'],$_POST['id']);
}
?>
