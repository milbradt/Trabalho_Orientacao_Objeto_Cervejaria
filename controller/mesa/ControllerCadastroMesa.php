<?php
require_once("../../model/Mesa.php");
class cadastroMesaController
{

    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Mesa();
        $this->incluir();
    }

    private function incluir()
    {
        $result = $this->cadastro->incluir();
        if ($result >= 1) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/mesa/tabelaMesa.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
$obj = new cadastroMesaController();
