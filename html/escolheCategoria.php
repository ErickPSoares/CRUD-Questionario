<?php
require_once '../php/model/Escolhe.php';

$escolhe = new Escolhe();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ProjetoIntegrador/css/escolheCategoria.css">
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
  <section>
    <h3>Escolha a Categoria</h3>
  </section>
  <section class="conjuntoBotoes mr-auto ml-auto">
  <?php
  $resultado = $escolhe->selectCategoria();
  foreach($resultado as $key => $value){
    echo 
    '<div class="botoes">
    <a href="questionario.php?id='.$value['idCategoria'].'" class="link">
      <label class="botao">'.$value['categoria'].'</label>
    </a>
    </div>';
  }
  ?>
  </section>



  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>