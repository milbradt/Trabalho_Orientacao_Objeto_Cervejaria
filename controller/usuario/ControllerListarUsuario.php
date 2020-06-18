<?php
    require_once("../../model/Banco.php");

    class listarControllerUsuario
     {

        private $lista;

        public function __construct(){

            $this->lista = new Banco();
            $this->criarTabela();

        }

        private function criarTabela()
        {

            $row = $this->lista->getUsuario();
            foreach ($row as $value) {
                echo "<tr>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['cpf'] ."</td>";
                echo "<td>".$value['email'] ."</td>";
                echo "<td>".$value['dataNasc'] . "</td>";
                echo "<td>".$value['admin'] = ($value['admin'] == "1") ? "Sim" : "Não" ."</td>";
                echo "<td><a class='btn btn-warning' href='../../view/usuario/editar.php?id=".$value['id']."'>Editar</a><a class='btn btn-danger' href='../../controller/usuario/ControllerDeletarUsuario.php?id=".$value['id']."'>Excluir</a></td>";
                echo "</tr>";
            }

        }

    }
?>