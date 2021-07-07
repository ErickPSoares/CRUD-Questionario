<?php

require_once 'Conexao.php';

class Questao extends Conexao

{
    public function selectCategoria()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM categoria");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function selectLegenda()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM legenda");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }
}
