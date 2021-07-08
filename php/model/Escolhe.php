<?php

require_once 'Conexao.php';

class Escolhe extends Conexao
{
    public function selectCategoria()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM categoria");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }
}
