<?php

$DIR = $_SERVER['DOCUMENT_ROOT'];
require_once( $DIR ."/controller/geral/ControllerSession.php");
require_once( $DIR ."/controller/geral/ControllerPage.php");
require_once( $DIR ."/controller/geral/ControllerErros.php");
require_once( $DIR ."/model/Banco.php");

class editarControllerUsuario {

    private $editar;
    private $nome;
    private $cpf;
    private $email;
    private $dataNasc;
    private $admin;
    private $id;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id){

        if ($id != 0) {

            $row = $this->editar->pesquisaUsuario($id);
            $this->nome = $row['nome'];
            $this->cpf = $row['cpf'];
            $this->email = $row['email'];
            $this->dataNasc = $row['dataNasc'];
            $this->admin = $row['admin'];
            $this->id = $row['id'];

        }

    }

    public function editarFormulario($nome, $cpf, $senha, $email, $dataNasc, $admin, $id){

        $page = new Page;

        if($this->editar->updateUsuario($nome, $cpf, password_hash($senha, PASSWORD_DEFAULT), $email, $dataNasc, $admin, $id) == TRUE) { //EDIÇÃO REALIZADA COM SUCESSO
            $page->newPage("tabela_usuario", "REGISTRO_SUCESSO");
        } else {
            $page->newPage("tabela_usuario", "REGISTRO_ERRO");
        }
        
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getEmail(){
        return $this->email;
    } 

    public function getDataNasc()
    {
        return $this->dataNasc;
    } 

    public function getAdmin(){
        return $this->admin;
    }

    public function getId(){
        return $this->id;
    }
}

$get = (isset($_GET['id']) ? $_GET['id'] : $_GET['id'] = 0);
$obj = new editarControllerUsuario($_GET['id']);

if(isset($_POST['submit'])){

    $db = new Banco;
    $page = new Page;
    $error = new ControllerErros;

    $ret = $db->getUsuarioAdmin($_SESSION["id"]); //PEGA OS DADOS SE O USUARIO EXISTIR
    if (!$error->checkErros($ret)) { // verifica erros no retorno da busca pelo admin
        $data = $ret[0];

        if ($data["admin"] > 0) {

            $obj->editarFormulario($_POST['nome'], $_POST['cpf'], $_POST['senha'], $_POST['email'], $_POST['dataNasc'], $_POST['admin'], $_POST['id']);

        } else {

            $page->newPage("tabela_usuario", "ADMIN_NECESSARIO");

        }

    } else {
        $page->newPage("tabela_usuario", "default");
    }

}

?>