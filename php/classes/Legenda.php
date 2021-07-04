<?php

include_once 'C:\xampp\htdocs\ProjetoIntegrador\html\cadastroGrupo.php';
include_once 'C:\xampp\htdocs\ProjetoIntegrador\php\conexao.php';


class Legenda
{
    private $legenda;

    public function setLegenda($legenda)
    {
        $this->legenda = $legenda;
    }

    public function getLegenda()
    {
        return $this->legenda;
    }

    public function insertLegenda($pdo)
    {
        $pdo = $pdo;
        $legenda = $this->legenda;
        $sql = $pdo->prepare("INSERT INTO `legenda` VALUES (NULL, ?) ");
        $sql->execute(array($legenda));
    }
}
