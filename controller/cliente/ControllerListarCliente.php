<?php
    require_once("../../model/banco.php");

    class listarControllerCliente
     {

        private $lista;

        public function __construct(){
            $this->lista = new Banco();
            $this->criarTabela();
        }

        private function criarTabela(){
            $row = $this->lista->getCliente();
            foreach ($row as $value){
                echo "<tr>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['cpf'] ."</td>";
                echo "<td>".$value['dataNasc'] . "</td>";
                echo "<td>".$value['logradouro'] ."</td>";
                echo "<td>".$value['bairro'] ."</td>";
                echo "<td>".$value['cep'] ."</td>";
                echo "<td>".$value['numero'] . "</td>";
                echo "<td>" . $value['cidade'] . "</td>";
                echo "<td>".$value['ativo'] = ($value['ativo'] == "0") ? "Desativado":"Ativado" ."</td>";
                echo "<td><a class='btn btn-warning' href='../../view/cliente/EditarCliente.php?id=".$value['id']."'>Editar</a><a class='btn btn-danger' href='../../controller/cerveja/ControllerDeletarCerveja.php?id=".$value['id']."'>Excluir</a></td>";
                echo "</tr>";
            }
        }
    }
?>