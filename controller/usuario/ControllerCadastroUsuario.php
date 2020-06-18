<?php

$DIR = $_SERVER['DOCUMENT_ROOT'];
require_once( $DIR ."/controller/geral/ControllerPage.php");
require_once( $DIR ."/controller/geral/ControllerSession.php");
require_once( $DIR ."/controller/geral/ControllerErros.php");
require_once( $DIR ."/model/Usuario.php");

class cadastroUsuarioController
{

    private $cadastro;

    public function __construct()
    {

        $page = new Page;
        $posts = (isset($_POST['nome'], $_POST['cpf'], $_POST['senha'], $_POST['email'], $_POST['admin'], $_POST['dataNasc']) == true ? true : false);

        if ($posts) {

            $this->cadastro = new Usuario();
            $error = new ControllerErros;
            $session_id = $_SESSION["id"];
            $ret = $this->cadastro->getUsuarioAdmin($session_id); //pega os dados de um usuario se existir

            if (!$error->checkErros($ret)) { // verifica erros no retorno da busca pelo admin
			
                $data = $ret[0];

                if ( $data["admin"] > 0 ) { //verifica se o usuario que vai cadastrar é um admin
                
                    $this->incluir();

                } else {

                    $page->newPage("tabela_usuario", "ADMIN_NECESSARIO");

                }

            } else {

                $page->newPage("tabela_usuario", "ADMIN_NECESSARIO");

            }

        } else {

            if ($_SERVER['REQUEST_URI'] != "/view/usuario/cadastro.php") { //se nao estiver na mesma pagina

                $page->newPage("cadastro_usuario");

            }

        }

    }

    private function incluir()
    {

        $page = new Page;
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->setSenha(password_hash($_POST["senha"], PASSWORD_DEFAULT));
        $this->cadastro->setEmail($_POST['email']);
        $this->cadastro->setAdmin($_POST['admin']);
        $this->cadastro->setDataNasc(date('Y-m-d', strtotime($_POST['dataNasc'])));

        $result = $this->cadastro->incluir();
        if ($result >= 1) {
            $page->newPage("tabela_usuario", "REGISTRO_SUCESSO");
        } else {
            $page->newPage("tabela_usuario", "REGISTRO_ERRO");
        }

    }
}
$obj = new cadastroUsuarioController();
