<?php
require_once("../../model/banco.php");
class UpdateMesa {
    private $update;
    

    public function __construct($id, $ocupado){
        $this->update = new Banco();
        if($this->update->updateMesa($id, $ocupado)== TRUE){
           echo "<script>alert('Sucesso ao alterar status da mesa!');document.location='../../view/mesa/tabelaMesa.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar status da mesa!');history.back()</script>";
        }
    }
}
$obj = new UpdateMesa($_GET['id'], $_GET['ocupado']);
