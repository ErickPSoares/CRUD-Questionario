<?php

require_once 'Conexao.php';

class Resultado extends Conexao
{

    public function getTotal()
    {
        return $this->total;
    }

    public function selectQuestao($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM pergunta WHERE Categoria_idCategoria = ?");
        $sql->execute(array($id));
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function selectIdPergunta($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT idPergunta FROM pergunta WHERE Categoria_idCategoria = ?");
        $sql->execute(array($id));
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function selectRisco($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM legenda WHERE idLegenda = ?");
        $sql->execute(array($id));
        return $sql->fetch();
    }
}
