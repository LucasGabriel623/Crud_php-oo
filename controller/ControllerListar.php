<?php
    include_once('../model/banco.php');

    class listarController {
        private $listar;

        public function __construct() {
            $this->listar = new Banco();
            $this->criarTabela();
        }

        private function criarTabela() {
            $row = $this->listar->getLivro();
            foreach($row as $value) {
                echo "<tr>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['autor'] ."</td>";
                echo "<td>".$value['quantidade'] ."</td>";
                echo "<td> R$:".$value['preco'] ."</td>";
                echo "<td>".$value['data'] ."</td>";
                echo "<td>".$value['flag'] = ($value['flag'] == "0") ? "Desativado":"Ativado" ."</td>";
                echo "<td><a class='btn btn-warning' href='editar.php?id=".$value['nome']."'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['nome']."'>Excluir</a></td>";
                echo "</tr>";
            }
        }
    }

?>