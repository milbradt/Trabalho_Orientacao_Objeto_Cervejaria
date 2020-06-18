<?php
require_once("../../model/cerveja.php");
class cadastroCervejaController
{

    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Cerveja();
        $this->incluir();
    }

    private function incluir()
    {
        $this->cadastro->setMarca($_POST['marca']);
        $this->cadastro->setTipo($_POST['tipo']);
        $this->cadastro->setMedida($_POST['medida']);
        $this->cadastro->setQuantidade($_POST['quantidade']);
        $this->cadastro->setPreco($_POST['preco']);
        $this->cadastro->setData(date('Y-m-d', strtotime($_POST['data'])));
        $result = $this->cadastro->incluir();
        if ($result >= 1) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/cerveja/tabelaCerveja.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
$obj = new cadastroCervejaController();
