<?php

require_once '../php/model/Legenda.php';

$legenda = new Legenda();

if (isset($_POST['cadastrar'])) {
    $legenda->setLegenda($_POST['legenda']);
    $legenda->setRisco($_POST['risco']);
    $legenda->insertLegenda();
}

if (isset($_POST['atualizar'])) {
    $legenda->setLegenda($_POST['legenda']);
    $legenda->setRisco($_POST['risco']);
    $id = $_GET['id'];
    $legenda->updateLegenda($id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/cadastroGrupo.css">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/bootstrap.min.css">
    <title>Grupo</title>
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
        <h3>Cadastrar Grupo</h3>
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == "deletar") {
            $id = $_GET['id'];
            $legenda->deletaLegenda($id);
        }
        if (isset($_GET['acao']) && $_GET['acao'] == "editar") {
            $id = $_GET['id'];
            $resultadoLegenda = $legenda->buscaLegenda($id);
            $resultadoRisco = $legenda->buscaRisco($id);
        ?>
            <form class="mr-auto ml-auto" method="post">
                <input type="text" name="legenda" class="form-control mb-3" value="<?php echo $resultadoLegenda[0]; ?>" placeholder="Grupo" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                <input type="text" name="risco" class="form-control mb-3" value="<?php echo $resultadoRisco[0]; ?>" placeholder="Limite" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                <button class="btn btn-outline-secondary cadastrar mb-3" type="submit" name="atualizar">Editar</button>
            </form>
        <?php } else { ?>
            <form class="mr-auto ml-auto" method="post">
                <input type="text" name="legenda" class="form-control mb-3" placeholder="Grupo" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                <input type="text" name="risco" class="form-control mb-3" placeholder="Limite" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                <button class="btn btn-outline-secondary cadastrar mb-3" type="submit" name="cadastrar">Cadastrar</button>
            </form>
        <?php } ?>
    </section>
    <div class="table-responsive-sm tabela">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Limite</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultadoObjeto = new Legenda;
                $resultado = $resultadoObjeto->selectLegenda();
                foreach ($resultado as $key => $value) {
                    echo '<tr>
        <td>' . $value['idLegenda'] . '</td>
        <td>' . $value['legenda'] . '</td>
        <td>' . $value['risco'] . '</td>
        <td>
        <form method="get">
        <a href="cadastroGrupo.php?acao=editar&id=' . $value['idLegenda'] . '"><img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16></a>
        <a href="cadastroGrupo.php?acao=deletar&id=' . $value['idLegenda'] . '"><img src="/ProjetoIntegrador/img/lixeira.png" alt="deletar" width=16 height=16></a>
        </form>
        </td>
    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>