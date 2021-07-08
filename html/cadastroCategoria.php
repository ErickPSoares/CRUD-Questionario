<?php

require_once '../php/model/Categoria.php';

$categoria = new Categoria();

if (isset($_POST['cadastrar'])) {
    $categoria->setCategoria($_POST['categoria']);
    $categoria->insertCategoria();
}

if (isset($_POST['atualizar'])) {
    $categoria->setCategoria($_POST['categoria']);
    $id = $_GET['id'];
    $categoria->updateCategoria($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/cadastroCategoria.css">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/bootstrap.min.css">
    <title>Categoria</title>
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
                  <li class="nav-link" >Página Inicial</li>
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
        <h3>Cadastrar Categoria</h3>
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == "deletar") {
            $id = $_GET['id'];
            $categoria->deletaCategoria($id);
        }
        if (isset($_GET['acao']) && $_GET['acao'] == "editar") {
            $id = $_GET['id'];
            $resultado = $categoria->buscaCategoria($id);

        ?>
            <form class="mr-auto ml-auto" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="categoria" class="form-control" value="<?php echo $resultado[0]; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="atualizar">Atualizar</button>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <form class="mr-auto ml-auto" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="categoria" class="form-control" placeholder="Digite aqui" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="cadastrar">OK</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </section>
    <div class="table-responsive-sm tabela">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $resultadoObjeto = new Categoria;
                $resultado = $resultadoObjeto->selectCategoria();
                foreach ($resultado as $key => $value) {
                    echo '<tr>
        <td>' . $value['idCategoria'] . '</td>
        <td>' . $value['categoria'] . '</td>
        <td>
        <form method="get">
        <a href="cadastroCategoria.php?acao=editar&id=' . $value['idCategoria'] . '"><img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16></a>
        <a href="cadastroCategoria.php?acao=deletar&id=' . $value['idCategoria'] . '"><img src="/ProjetoIntegrador/img/lixeira.png" alt="deletar" width=16 height=16></a>
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