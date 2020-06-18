<?php
    require_once("../../model/banco.php");

    class listarControllerCerveja
     {

        private $lista;

        public function __construct(){
            $this->lista = new Banco();
            $this->criarTabela();
        }

        private function criarTabela(){
            $row = $this->lista->getCerveja();
            foreach ($row as $value){
                echo "<tr>";
                echo "<th>".$value['marca'] ."</th>";
                echo "<td>".$value['tipo'] ."</td>";
                echo "<td>".$value['medida'] . "</td>";
                echo "<td>".$value['quantidade'] ."</td>";
                echo "<td> R$ ".$value['preco'] ."</td>";
                echo "<td>".$value['data'] ."</td>";
                echo "<td>".$value['ativo'] = ($value['ativo'] == "0") ? "Desativado":"Ativado" ."</td>";
                echo "<td><a class='btn btn-warning' href='../../view/cerveja/EditarCerveja.php?id=".$value['id']."'>Editar</a><a class='btn btn-danger' href='../../controller/cerveja/ControllerDeletarCerveja.php?id=".$value['id']."'>Excluir</a></td>";
                echo "</tr>";
            }
        }
    }
?>