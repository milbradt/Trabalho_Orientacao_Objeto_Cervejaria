<?php
    
    require_once("../init.php");

    class Banco {

    protected $con;

    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {
        $this->con = new PDO('mysql:host=' . BD_SERVIDOR . ';dbname=' . BD_BANCO, BD_USUARIO, BD_SENHA);
    }

    public function setCerveja($marca, $tipo, $medida, $quantidade, $preco, $data)
    {
        $res = $this->con->prepare("INSERT INTO cerveja (`marca`, `tipo`, `medida`, `quantidade`, `preco`, `data`) VALUES (?,?,?,?,?,?)");
        $res->bindValue(1, $marca, PDO::PARAM_STR);
        $res->bindValue(2, $tipo, PDO::PARAM_STR);
        $res->bindValue(3, $medida, PDO::PARAM_STR);
        $res->bindValue(4, $quantidade, PDO::PARAM_INT);
        $res->bindValue(5, $preco, PDO::PARAM_STR);
        $res->bindValue(6, $data, PDO::PARAM_STR);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($nome, $cpf, $email, $senha, $dataNasc)
    {
        $res = $this->con->prepare("INSERT INTO usuario (`nome`, `cpf`, `email`, `senha`, `dataNasc`) VALUES (?,?,?,?,?)");
        $res->bindValue(1, $nome, PDO::PARAM_STR);
        $res->bindValue(2, $cpf, PDO::PARAM_STR);
        $res->bindValue(3, $email, PDO::PARAM_STR);
        $res->bindValue(4, $senha, PDO::PARAM_INT);
        $res->bindValue(5, $dataNasc, PDO::PARAM_STR);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getCerveja()
    {
        $res = $this->con->query("SELECT * FROM cerveja");
        return $res->fetchAll();
    }

    public function getUsuario()
    {
        $res = $this->con->query("SELECT * FROM usuario");
        return $res->fetchAll();
    }

    public function deleteCerveja($id)
    {
        if ($this->con->query("DELETE FROM cerveja WHERE id='$id'") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUsuario($id)
    {
        if ($this->con->query("DELETE FROM usuario WHERE id='$id'") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function pesquisaCerveja($id)
    {
        $res = $this->con->query("SELECT * FROM cerveja WHERE id='$id'");
        return $res->fetch();
    }

    public function pesquisaUsuario($id)
    {
        $res = $this->con->query("SELECT * FROM usuario WHERE id='$id'");
        return $res->fetch();
    }

    public function updateCerveja($marca, $tipo, $medida, $quantidade, $preco, $data, $ativo, $id){

        $res = $this->con->prepare("UPDATE cerveja SET marca = ?, tipo = ?, medida = ?, quantidade = ?, preco = ?, ativo = ?, data = ? WHERE id = ?");

        $res->bindValue(1, $marca, PDO::PARAM_STR);
        $res->bindValue(2, $tipo, PDO::PARAM_STR);
        $res->bindValue(3, $medida, PDO::PARAM_STR);
        $res->bindValue(4, $quantidade, PDO::PARAM_INT);
        $res->bindValue(5, $preco, PDO::PARAM_STR);
        $res->bindValue(6, $ativo, PDO::PARAM_INT);
        $res->bindValue(7, $data, PDO::PARAM_STR);
        $res->bindValue(8, $id, PDO::PARAM_INT);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }

    }

    public function updateUsuario($nome, $cpf, $email, $senha, $dataNasc, $ativo, $id)
    {

        $res = $this->con->prepare("UPDATE usuario SET nome = ?, cpf = ?, email = ?, senha = ?,  dataNasc = ?, ativo = ? WHERE id = ?");

        $res->bindValue(1, $nome, PDO::PARAM_STR);
        $res->bindValue(2, $cpf, PDO::PARAM_STR);
        $res->bindValue(3, $email, PDO::PARAM_STR);
        $res->bindValue(4, $senha, PDO::PARAM_STR);
        $res->bindValue(5, $dataNasc, PDO::PARAM_STR);
        $res->bindValue(6, $ativo, PDO::PARAM_INT);
        $res->bindValue(7, $id, PDO::PARAM_INT);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }



    }

?>