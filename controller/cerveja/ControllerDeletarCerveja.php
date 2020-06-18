<?php
require_once("../../model/banco.php");
class deletaControllererveja {
    private $deleta;

    public function __construct($id){
        $this->deleta = new Banco();
        if($this->deleta->deleteCerveja($id)== TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../../view/cerveja/tabelaCerveja.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
$obj = new deletaControllererveja($_GET['id']);
?>
