<?php
require_once("../../model/cliente.php");
class cadastroClienteController
{

    private $cadastro;

    public function __construct()
    {
        var_dump($_POST['nome']);
        $this->cadastro = new Cliente();
        $this->incluir();
    }

    private function incluir()
    {
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->setDataNasc(date('Y-m-d', strtotime($_POST['dataNasc'])));
        $this->cadastro->setLogradouro($_POST['logradouro']);
        $this->cadastro->setBairro($_POST['bairro']);
        $this->cadastro->setCep($_POST['cep']);
        $this->cadastro->setNumero($_POST['numero']);
        $this->cadastro->setCidade($_POST['cidade']);
        $result = $this->cadastro->incluir();

        //var_dump( $this->cadastro);

        if ($result >= 1) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/cliente/tabelaCliente.php'</script>";
        } else {
           echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
$obj = new cadastroClienteController();
