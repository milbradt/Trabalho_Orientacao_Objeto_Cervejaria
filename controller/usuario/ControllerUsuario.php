<?php

$DIR = $_SERVER['DOCUMENT_ROOT'];
require_once( $DIR ."/controller/geral/ControllerPage.php");
require_once( $DIR ."/controller/geral/ControllerErros.php");
require_once( $DIR ."/controller/geral/ControllerSession.php");
require_once( $DIR ."/model/Usuario.php");

class ControllerUsuario
{

	public function __construct()
	{

		$gets = (isset($_GET['msg']) == true ? $_GET['msg'] : false);
		$posts = (isset($_POST['cpf'], $_POST['senha']) == true ? true : false);
		
		if ($posts) {

			$this->login();

		} elseif ($gets == "SAIR") {

			$this->loghout();

		} else {

			$this->estaLogado();

		}

	}

	public function loghout() 
	{

		if (getSession("id") != false) {
			
			session_destroy();

		}
		
		$page = new Page;
		$page->newPage("login");

	}

	public function login()
	{

		$page = new Page;

		if ( $this->verificarLogin($_POST['cpf'], $_POST['senha']) ) { // verifica os dados inseridos

			$page->newPage("tabela_usuario");

		} else {

			$page->newPage("login_invalido", "LOGIN_INVALIDO"); // dados invalidos retorna pro login novamente

		}

	}

	public function estaLogado($admin = true) // verifica se o usuario esta ou nao logado
	{

		$page = new Page;
		$verificar = getSession("id");

        if (!isset($verificar) || !$verificar || !(int)$verificar > 0) { // nao tiver sessao

			$msgs = array(
				"LOGIN_NECESSARIO",
				"LOGIN_SENHA_INVALIDO",
				"LOGIN_INVALIDO",
			);

			$uri = $_SERVER["REQUEST_URI"];
			$msg = (@end(explode('=', $uri)));

			if (!in_array($msg, $msgs)) { //se nao tiver em uma das uri do array

				$page->newPage("login_necessario", "LOGIN_NECESSARIO");

			}

		} else {
			
			if ($_SERVER['REQUEST_URI'] != "/view/usuario/cadastro.php") { // nao estiver na pagina cadastro

				$page->newPage("tabela_usuario");

			}

		}

    }

    public function verificarLogin($login, $password) //verifica e valida os dados realizados via post do login
    {

		if(!is_numeric($login)) {
			return false;
		}

		$user = new Usuario;
		$getErro = new ControllerErros;
		$ret = $user->getUsuarioPorCpf($login); //pega os dados de um usuario se existir

        if ( $getErro->checkErros($ret) ) { // verifica se o usuario nao foi encontrado
			
			unset($user);
			return false; // usuario nao encontrado

        }

        $data = $ret[0];

		if (password_verify($password, $data["senha"])) { //confere a senha passada pelo post com a encontrado no banco de dados do usuario encontrado

			setSession("id", $data["id"]);

			return true; // senha validada

		} else {

			unset($user);
            return false; //senha nao foi validada

		}

    }
	
}
$obj = new ControllerUsuario;