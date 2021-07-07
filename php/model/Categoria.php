<?php

require_once '../html/cadastroCategoria.php';
require_once 'Conexao.php';


class Categoria extends Conexao
{
    private $categoria;
    private $idCategoria;

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($id)
    {
        $this->idCategoria = $id;
    }

    public function insertCategoria()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("INSERT INTO `categoria` VALUES (NULL, ?) ");
        $categoria = $this->categoria;
        $sql->execute(array($categoria));
    }

    public function selectCategoria()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM categoria");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function buscaCategoria($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT `categoria` FROM categoria WHERE idCategoria = ?");
        $sql->execute(array($id));
        $resultado = $sql->fetch();
        return $resultado;
    }

    public function updateCategoria($id)
    {
        $categoria = $this->categoria;
        $idCategoria = $id;
        $pdo = $this->conexao();
        $sql = $pdo->prepare("UPDATE `categoria` SET categoria = ? WHERE idCategoria = ?");
        $sql->execute(array($categoria, $idCategoria));
    }

    public function deletaCategoria($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("DELETE FROM `categoria` WHERE idCategoria = ?");
        $sql->execute(array($id));
    }
}