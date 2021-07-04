<?php
    require_once 'C:\xampp\htdocs\ProjetoIntegrador\php\classes\Legenda.php';

    if(isset($_POST['acao']))
    {
        $legenda = new Legenda();
        $legenda->setLegenda($_POST['legenda']);
        $legenda->insertLegenda($pdo);
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
    <title>Document</title>
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
    <section class="cadastro">
        <h3>Cadastrar Grupo</h3>
        <form class="mr-auto ml-auto" method="post">
            <div class="input-group mb-3">
                <input type="text" name="legenda" class="form-control" placeholder="Digite aqui" aria-label="Recipient's username"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="acao">OK</button>
                </div>
            </div>
        </form>
    </section>
    <!--
    <div class="table-responsive-sm tabela">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>
                        <img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16>
                        <img src="/ProjetoIntegrador/img/lixeira.png" alt="editar" width=16 height=16>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>
                        <img src="/ProjetoIntegrador/img/lapis.png" alt="editar" width=16 height=16>
                        <img src="/ProjetoIntegrador/img/lixeira.png" alt="editar" width=16 height=16>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
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