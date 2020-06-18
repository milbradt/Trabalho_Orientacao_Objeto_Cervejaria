<?php

$DIR = $_SERVER['DOCUMENT_ROOT'];
require_once( $DIR ."/model/Banco.php");

class deletaControllerUsuario {
    private $deleta;

    public function __construct($id){
        $this->deleta = new Banco();
        if($this->deleta->deleteUsuario($id)== TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../../view/usuario/tabela.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
$obj = new deletaControllerUsuario($_GET['id']);
?>