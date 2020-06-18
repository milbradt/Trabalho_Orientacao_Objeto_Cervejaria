<?php
require_once("../../model/banco.php");

class editarControllerCerveja {

    private $editar;
    private $marca;
    private $tipo;
    private $medida;
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
        $row = $this->editar->pesquisaCerveja($id);
        $this->marca        = $row['marca'];
        $this->tipo         = $row['tipo'];
        $this->medida       = $row['medida'];
        $this->quantidade   = $row['quantidade'];
        $this->preco        = $row['preco'];
        $this->data         = $row['data'];
        $this->ativo        = $row['ativo'];
        $this->id           = $row['id'];

    }

    public function editarFormulario($marca,$tipo, $medida,$quantidade,$preco,$data,$ativo,$id){
        if($this->editar->updateCerveja($marca,$tipo,$medida,$quantidade,$preco,$data,$ativo,$id) == TRUE){
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../../view/cerveja/tabelaCerveja.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
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
    public function getAtivo(){
        return $this->ativo;
    }
    public function getId(){
        return $this->id;
    }
}

$obj = new editarControllerCerveja($_GET['id']);
if(isset($_POST['submit'])){
    $obj->editarFormulario($_POST['marca'],$_POST['tipo'],$_POST['medida'],$_POST['quantidade'],$_POST['preco'],$_POST['data'],$_POST['ativo'],$_POST['id']);
}
?>
