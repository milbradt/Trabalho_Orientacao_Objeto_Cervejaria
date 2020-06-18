<?php
    require_once("../../model/banco.php");

    class listarControllerMesa
     {

        private $lista;
        private $controle;

        public function __construct(){
            $this->lista = new Banco();
            $this->criarTabela();
        }

        private function criarTabela(){
            $row = $this->lista->getMesa();
            foreach ($row as $value){
                $controle = $value['ocupado'];
                echo "<tr>";
                echo "<th>".$value['id'] ."</th>";    
                echo "<td>".$value['ocupado'] = ($value['ocupado'] == "0") ? "Livre":"Ocupado" ."</td>";

                if ($controle == 0) {
                echo "<td>
                <a class='btn btn-success' href='../../controller/mesa/ControllerEditarMesa.php?id=" . $value['id'] ."&ocupado=". $controle."'>Ocupar</a>";
                }else {
                echo "<td>
                <a class='btn btn-warning' href='../../controller/mesa/ControllerEditarMesa.php?id=" . $value['id'] ."&ocupado=". $controle. "'>Liberar</a>";
                }
                echo "<a class='btn btn-danger' href='../../controller/mesa/ControllerDeletarMesa.php?id=".$value['id']."'>Excluir</a>
                </td>";
                echo "</tr>";
            }
        }
    }
?>