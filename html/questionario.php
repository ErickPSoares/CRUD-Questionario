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
                <a href="inicial.html">
                  <li class="nav-link" >Página Inicial</li>
                </a>
                <a href="cadastroCategoria.html">
                  <li class="nav-link">Categorias</li>
                </a>
                <a href="cadastroGrupo.html">
                  <li class="nav-link">Grupos</li>
                </a>
                <a href="cadastroQuestao.html">
                  <li class="nav-link">Perguntas</li>
                </a>       
              </ul>
        </div>
    </nav>
    <section>
        <h3>Marque uma opção para cada pergunta</h3>

        <div class="pergunta ml-auto mr-auto">
            <h6>Vem do banco</h6>
        </div>
        <div class="radios">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="" value="option1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    Não
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Ás vezes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    A maior parte das vezes
                </label>
            </div>
        </div>
        <div class="pergunta ml-auto mr-auto">
            <h6>Vem do banco</h6>
        </div>
        <div class="radios">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vemDoBanco" id="" value="option1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    Não
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vemDoBanco" id="" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Ás vezes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vemDoBanco" id="" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    A maior parte das vezes
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-secondary btn-lg resultado">Resultado</button>

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </section>
</body>

</html>