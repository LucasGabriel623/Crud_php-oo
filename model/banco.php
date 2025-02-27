<?php

include_once("../conexao.php");
class Banco {

    protected $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(localhost, usuario, senha, banco);
    }

    public function setLivro($nome, $autor, $quantidade, $preco, $data) {
        $stmt = $this->mysqli->prepare("INSERT INTO livros (`nome`, `autor`, `quantidade`, `preco`, `data`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $nome,$autor,$quantidade,$preco,$data);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getLivro() {
        $result = $this->mysqli->query("SELECT * FROM livros");
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    public function deleteLivro($id) {
        if ($this->mysqli->query("DELETE FROM livros WHERE nome = '".$id."';")== TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function pesquisarLivro($id) {
        $result = $this->mysqli->query("SELECT * FROM livros WHERE nome='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function updateLivro($nome,$autor,$quantidade,$preco,$flag,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `livros` SET `nome` = ?, `autor`=?, `quantidade`=?, `preco`=?, `flag`=?,`data` = ? WHERE `nome` = ?");
        $stmt->bind_param("sssssss",$nome,$autor,$quantidade,$preco,$flag,$data,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}

?>