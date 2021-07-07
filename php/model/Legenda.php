<?php

require_once '../html/cadastroGrupo.php';
require_once 'Conexao.php';


class Legenda extends Conexao
{
    private $legenda;
    private $idLegenda;

    public function setLegenda($legenda)
    {
        $this->legenda = $legenda;
    }

    public function getIdLegenda()
    {
        return $this->idLegenda;
    }

    public function setIdLegenda($id)
    {
        $this->idLegenda = $id;
    }

    public function insertLegenda()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("INSERT INTO `legenda` VALUES (NULL, teste) ");
        $legenda = $this->legenda;
        $sql->execute(array($legenda));
    }

    public function selectLegenda()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM legenda");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function buscaLegenda($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT `legenda` FROM legenda WHERE idLegenda = ?");
        $sql->execute(array($id));
        $resultado = $sql->fetch();
        return $resultado;
    }

    public function updateLegenda($id)
    {
        $legenda = $this->legenda;
        $idLegenda = $id;
        $pdo = $this->conexao();
        $sql = $pdo->prepare("UPDATE `legenda` SET legenda = ? WHERE idLegenda = ?");
        $sql->execute(array($legenda, $idLegenda));
    }

    public function deletaLegenda($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("DELETE FROM `legenda` WHERE idLegenda = ?");
        $sql->execute(array($id));
    }
}
