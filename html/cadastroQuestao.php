<?php

require_once '../php/model/Questao.php';

$questao = new Questao();

if (isset($_POST['cadastrar'])) {
    $questao->setDescricao($_POST['descricao']);
    $questao->setCategoria($_POST['categoria']);
    $questao->setLegenda($_POST['legenda']);
    $questao->insertQuestao();
}
if (isset($_POST['atualizar'])) {
    $questao->setDescricao($_POST['descricao']);
    $questao->setCategoria($_POST['categoria']);
    $questao->setLegenda($_POST['legenda']);
    $id = $_GET['id'];
    $questao->updateQuestao($id);
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
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == "deletar") {
            $id = $_GET['id'];
            $questao->deletaQuestao($id);
        }
        if (isset($_GET['acao']) && $_GET['acao'] == "editar") {
            $id = $_GET['id'];
            $resultadoQuestao = $questao->buscaQuestao($id);
        ?>
        <form method="post" class="ml-auto mr-auto">
            <div class="input-group mb-3 formataSelect mr-auto ml-auto">
                <select name="categoria" class="form-control selecionar select" id="exampleFormControlSelect1" required>
                    <option selected disabled>Categoria</option>
                    <?php
                    $resultadoCategoria = $questao->selectCategoria();
                    foreach ($resultadoCategoria as $key => $value) {
                    ?>
                        <option value="<?php echo $value['idCategoria']; ?>"><?php echo $value['categoria']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group mb-3 formataSelect mr-auto ml-auto">
                <select name="legenda" class="form-control selecionar select" id="exampleFormControlSelect1" required>
                    <option selected disabled>Grupo</option>
                    <?php
                    $resultadoLegenda = $questao->selectLegenda();
                    foreach ($resultadoLegenda as $key => $value) {
                    ?>
                        <option value="<?php echo $value['idLegenda']; ?>"><?php echo $value['legenda']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <form class="mr-auto ml-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="descricao" value="<?php echo $resultadoQuestao['descricao']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="atualizar">Atualizar</button>
                    </div>
                </div>
            </form>
        </form>
        <?php } else {?>
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
        <?php } ?>
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
            <tbody>

                <?php
                $resultado = $questao->selectQuestao();

                foreach ($resultado as $key => $value) {
                    echo '                
                        <tr> 
                        <td>' . $value['idPergunta'] . '</td>
                        <td>' . $value['categoria'] . '</td>
                        <td>' . $value['legenda'] . '</td>
                        <td>' . $value['descricao'] . '</td>
                        <td>
                        <form method="get">
                            <a href="cadastroQuestao.php?acao=editar&id=' . $value['idPergunta'] . '"><img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16></a>
                            <a href="cadastroQuestao.php?acao=deletar&id=' . $value['idPergunta'] . '"><img src="/ProjetoIntegrador/img/lixeira.png" alt="deletar" width=16 height=16></a>
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