<?php

require_once '../php/model/Questao.php';

$questao = new Questao();

if (isset($_POST['cadastrar'])) {
    $questao->setDescricao($_POST['descricao']);
    $questao->setCategoria($_POST['categoria']);
    $questao->setLegenda($_POST['legenda']);
    $questao->insertQuestao();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/cadastroQuestao.css">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/bootstrap.min.css">
    <title>Questões</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1>Marcos do Desenvolvimento</h1>
        <button class="navbar-toggler ml-auto mr-auto" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSite">
            <ul class="navbar-nav">
                <a href="inicial.php">
                    <li class="nav-link">Página Inicial</li>
                </a>
                <a href="cadastroCategoria.php">
                    <li class="nav-link">Categorias</li>
                </a>
                <a href="cadastroGrupo.php">
                    <li class="nav-link">Grupos</li>
                </a>
                <a href="cadastroQuestao.php">
                    <li class="nav-link">Perguntas</li>
                </a>
            </ul>
        </div>
    </nav>
    <section class="cadastro">
        <h3>Cadastrar Questão</h3>
        <form method="post" class="ml-auto mr-auto">
            <div class="input-group mb-3 formataSelect mr-auto ml-auto">
                <select name="categoria" class="form-control selecionar select" id="exampleFormControlSelect1">
                    <option selected disabled>Categoria</option>
                    <?php
                    $resultado = $questao->selectCategoria();
                    foreach ($resultado as $key => $value) {
                    ?>
                        <option value="<?php echo $value['idCategoria']; ?>"><?php echo $value['categoria']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group mb-3 formataSelect mr-auto ml-auto">
                <select name="legenda" class="form-control selecionar select" id="exampleFormControlSelect1">
                    <option selected disabled>Grupo</option>
                    <?php
                    $resultado = $questao->selectLegenda();
                    foreach ($resultado as $key => $value) {
                    ?>
                        <option value="<?php echo $value['idLegenda']; ?>"><?php echo $value['legenda']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <form class="mr-auto ml-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="descricao" placeholder="Digite aqui" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="cadastrar">OK</button>
                    </div>
                </div>
            </form>
        </form>
    </section>
    <div class="table-responsive-sm tabela">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <!--
        <div class="table-responsive-sm tabela">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>9 meses - 12 meses</td>
                    <td>Avaliação cognitivo-social</td>
                    <td>A criança imita 2 gestos (bate palma, dá tchau, manda beijo)?</td>
                    <td>
                        <img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16>
                        <img src="/ProjetoIntegrador/img/lixeira.png" alt="editar" width=16 height=16>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>9 meses - 12 meses</td>
                    <td>Avaliação cognitivo-social</td>
                    <td>A criança sorri quando alguém sorri para ela?</td>
                    <td>
                        <img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16>
                        <img src="/ProjetoIntegrador/img/lixeira.png" alt="editar" width=16 height=16>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>9 meses - 12 meses</td>
                    <td>Avaliação de coordenação motora fina</td>
                    <td>A criança consegue fazer uma torre pequena com blocos</td>
                    <td>
                        <img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16>
                        <img src="/ProjetoIntegrador/img/lixeira.png" alt="editar" width=16 height=16>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
                -->

            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
</body>

</html>