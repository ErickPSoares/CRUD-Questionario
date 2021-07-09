<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/questionario.css">
    <link rel="stylesheet" href="/ProjetoIntegrador/css/bootstrap.min.css">
    <title>Questionário</title>
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
    <?php
    require_once '../php/model/Resultado.php';

    $objeto = new Resultado();
    $total = 0;
    if (isset($_POST['resultado'])) {
        $idCategoria = $_GET['id'];
        $resultado = $objeto->selectIdPergunta($idCategoria);
        foreach ($resultado as $key => $value) {
            $atual = $value['idPergunta'];
            $auxiliar = $_POST["$atual"];
            $total = $total + $auxiliar;
        }
        $id = $_GET['id'];
        $risco = $objeto->selectRisco($id);
        $risco = $risco['risco'];
        if ($total >= $risco) {
            $final = "Dentro do esperado";
        } else {
            $final = "Desenvolvimento em risco";
        }
    ?>
        <?php
        echo '<div class="ml-auto mr-auto resposta">
<h1>' . $final . '</h1>
</div>';
        ?>
    <?php } else { ?>
        <section>
            <h3>Marque uma opção para cada pergunta</h3>
            <form method="post">
                <?php
                $id = $_GET['id'];
                $resultado = $objeto->selectQuestao($id);
                foreach ($resultado as $key => $value) {
                    echo '        <div class="pergunta ml-auto mr-auto">
                <h6>' . $value['descricao'] . '</h6>
            </div>
            <div class="radios">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="' . $value['idPergunta'] . '" id="" value="0"
                        checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Não
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="' . $value['idPergunta'] . '" id="" value="1">
                    <label class="form-check-label" for="exampleRadios2">
                        Ás vezes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="' . $value['idPergunta'] . '" id="" value="2">
                    <label class="form-check-label" for="exampleRadios2">
                        A maior parte das vezes
                    </label>
                </div>
            </div>';
                }
                ?>

                <button type="submit" name="resultado" class="btn btn-secondary btn-lg resultado">Resultado</button>
            </form>

        <?php } ?>

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        </section>
</body>

</html>