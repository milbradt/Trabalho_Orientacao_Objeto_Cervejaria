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
        $res->bindValue(2, $cpf, PDO::PARAM_INT);
        $res->bindValue(3, $email, PDO::PARAM_STR);
        $res->bindValue(4, $senha, PDO::PARAM_INT);
        $res->bindValue(5, $dataNasc, PDO::PARAM_STR);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($nome, $cpf, $dataNasc, $logradouro, $bairro, $cep, $numero, $cidade, $ativo)
    {
        $res = $this->con->prepare("INSERT INTO usuario (`nome`, `cpf`, `dataNasc`, `logradouro`, `bairro`, `cep`, `numero`, `cidade`, `ativo`) VALUES (?,?,?,?,?,?,?,?,?)");
        $res->bindValue(1, $nome, PDO::PARAM_STR);
        $res->bindValue(2, $cpf, PDO::PARAM_INT);
        $res->bindValue(3, $dataNasc, PDO::PARAM_STR);
        $res->bindValue(4, $logradouro, PDO::PARAM_STR);
        $res->bindValue(5, $bairro, PDO::PARAM_STR);
        $res->bindValue(6, $cep, PDO::PARAM_INT);
        $res->bindValue(7, $numero, PDO::PARAM_INT);
        $res->bindValue(8, $cidade, PDO::PARAM_STR);
        $res->bindValue(9, $ativo, PDO::PARAM_INT);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function setMesa($ocupado)
    {
        $res = $this->con->prepare("INSERT INTO mesa (`ocupado`) VALUES (?)");
        $res->bindValue(1, $ocupado, PDO::PARAM_INT);
        

        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function setPedido($clienteId, $mesaId, $valorTotal, $finalizado)
    {
        
        $res = $this->con->prepare("INSERT INTO pedido (`cliente_id`, `mesa_id`, `valor_total`, `finalizado`) VALUES (?,?,?,?)");
        $res->bindValue(1, $clienteId, PDO::PARAM_INT);
        $res->bindValue(2, $mesaId, PDO::PARAM_INT);
        $res->bindValue(3, $valorTotal, PDO::PARAM_INT);
        $res->bindValue(1, $finalizado, PDO::PARAM_INT);

        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;

        }
    }

    public function setItensPedido($cervejaId, $pedidoId)
    {
        $res = $this->con->prepare("INSERT INTO itens_pedido (`cerveja_id`, `pedido_id`) VALUES (?,?)");
        $res->bindValue(1, $cervejaId, PDO::PARAM_INT);
        $res->bindValue(2, $pedidoId, PDO::PARAM_INT);
        

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

    public function getCliente()
    {
        $res = $this->con->query("SELECT * FROM cliente");
        return $res->fetchAll();
    }

    public function getMesa()
    {
        $res = $this->con->query("SELECT * FROM mesa");
        return $res->fetchAll();
    }

    public function getPedido()
    {
        $res = $this->con->query("SELECT * FROM pedido");
        return $res->fetchAll();
    }

    public function getItensPedido()
    {
        $res = $this->con->query("SELECT * FROM itens_pedido");
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

    public function deleteCliente($id)
    {
        if ($this->con->query("DELETE FROM cliente WHERE id='$id'") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMesa($id)
    {
        if ($this->con->query("DELETE FROM mesa WHERE id='$id'") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePedido($id)
    {
        if ($this->con->query("DELETE FROM pedido WHERE id='$id'") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteItensPedido($id)
    {
        if ($this->con->query("DELETE FROM itens_pedido WHERE id='$id'") == TRUE) {
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

    public function pesquisaCliente($id)
    {
        $res = $this->con->query("SELECT * FROM cliente WHERE id='$id'");
        return $res->fetch();
    }

    public function pesquisaMesa($id)
    {
        $res = $this->con->query("SELECT * FROM mesa WHERE id='$id'");
        return $res->fetch();
    }

    public function pesquisaPedido($id)
    {
        $res = $this->con->query("SELECT * FROM pedido WHERE id='$id'");
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

    public function updateCliente($nome, $cpf, $dataNasc, $logradouro, $bairro, $cep, $numero, $cidade, $ativo, $id)
    {

        $res = $this->con->prepare("UPDATE cliente SET nome = ?, cpf = ?, dataNasc = ?, logradouro = ?, bairro = ?, cep = ?, numero = ?, cidade = ?, ativo = ? WHERE id = ?");

        $res->bindValue(1, $nome, PDO::PARAM_STR);
        $res->bindValue(2, $cpf, PDO::PARAM_STR);
        $res->bindValue(3, $dataNasc, PDO::PARAM_STR);
        $res->bindValue(4, $logradouro, PDO::PARAM_STR);
        $res->bindValue(5, $bairro, PDO::PARAM_STR);
        $res->bindValue(6, $cep, PDO::PARAM_INT);
        $res->bindValue(7, $numero, PDO::PARAM_INT);
        $res->bindValue(8, $cidade, PDO::PARAM_INT);
        $res->bindValue(9, $ativo, PDO::PARAM_INT);
        $res->bindValue(10, $id, PDO::PARAM_INT);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function updateMesa($ocupado, $clienteId)
    {

        $res = $this->con->prepare("UPDATE mesa SET ocupado = ?, cliente_id = ? WHERE id = ?");

        $res->bindValue(1, $ocupado, PDO::PARAM_STR);
        $res->bindValue(2, $clienteId, PDO::PARAM_STR);
        if ($res->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }



    }

?>