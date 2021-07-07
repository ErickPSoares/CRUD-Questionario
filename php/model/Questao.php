<?php

require_once 'Conexao.php';

class Questao extends Conexao

{
    private $descricao;
    private $legenda;
    private $categoria;

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setLegenda($legenda)
    {
        $this->legenda = $legenda;
    }

    public function getLegenda()
    {
        return $this->legenda;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

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

    public function insertQuestao()
    {
        $descricao = $this->descricao;
        $categoria = $this->categoria;
        $legenda = $this->legenda;
        $pdo = $this->conexao();
        $sql = $pdo->prepare("INSERT INTO `pergunta`  VALUES (NULL, ?, ?, ?)");
        $sql->execute(array($descricao,$categoria,$legenda));
    }
}
