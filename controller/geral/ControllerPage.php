<?php 

    class Page 
    {
    
        private $redirect;
        private $msg;

        public function newPage($redirect, $msgErro = false)
        {

            if ( $msgErro ) {

                switch( $msgErro ){

                    case "ADMIN_NECESSARIO":
                        $this->msg = "Apenas um administrador pode fazer isso!";
                    break;
    
                    case "REGISTRO_SUCESSO":
                        $this->msg = "Registro atualizado com sucesso!";
                    break;
    
                    case "REGISTRO_ERRO":
                        $this->msg = "Erro ao gravar registro!";
                    break;

                    case "SAIR_MSG":
                        $this->msg = "Você efetuou loghout com sucesso!";
                    break; 
                    
                    case "LOGIN_INVALIDO":
                        $this->msg = "Login invalido! Tente novamente!";
                    break;   
                    
                    case "LOGIN_NECESSARIO":
                        $this->msg = "É necessário realizar login!";
                    break;                       
    
                    default:
                        $this->msg = "Erro ao realizar esta ação!";

                }

            }

            switch($redirect) {

                case "login":
                    $this->redirect = "/view/login/login.php";
                    break;

                case "login_necessario":
                    $this->redirect = "/view/login/login.php?msg=LOGIN_NECESSARIO";
                    break;

                case "login_invalido":
                    $this->redirect = "/view/login/login.php?msg=LOGIN_SENHA_INVALIDO";
                    break;

                case "tabela_usuario":
                    $this->redirect = "/view/usuario/tabela.php";
                    break;

                case "cadastro_usuario":
                    $this->redirect = "/view/usuario/cadastro.php";
                    break;

                case "sair":
                    $this->redirect = "/controller/usuario/ControllerUsuario.php?msg=SAIR";
                    break;                 

                case "editar_usuario":
                    $this->redirect = "/view/usuario/editar.php";
                    break;

                default:
                    $this->redirect = "/view/index.php";

            }

            if ( $msgErro ) 
                echo "<script>alert('{$this->msg}');document.location='{$this->redirect}'</script>";
            else    
                echo "<script>document.location='{$this->redirect}'</script>";

            //header("Location: ".$this->redirect);
            exit();

        }

    }

?>