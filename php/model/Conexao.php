<?php

class Conexao
{
    public function conexao () {
        $pdo = new pdo('mysql:host=localhost;dbname=mydb', 'root', '');
        return $pdo;
    }
}
