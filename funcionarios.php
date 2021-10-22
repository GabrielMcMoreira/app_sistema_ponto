<?php
  include('protect.php');
  include('conexao.php');

  $sql = "SELECT fun_nome as Nome, fun_cargo as Cargo, fun_fone as Fone, fun_data_admissao as Admissao FROM funcionario WHERE fun_status LIKE 'A'";
  $result = mysqli_query($mysqli, $sql) or die("Erro ao tentar exibir");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Funcionarios- Aquicob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="funcionarios.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  
  
  <div class="container">
  <img ID="imagem" src="assets/img/aquicob.png" width="80" height="80">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="painel.php" class="nav-link px-2 link-dark">Inicio</a></li>
        <li><a href="cadastro.php" class="nav-link px-2 link-dark">Cadastrar</a></li>
        <li><a href="relatorio.php" class="nav-link px-2 link-dark">Relatório</a></li>
        <li><a href="#" class="nav-link px-2 link-secundary">Funcionários</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="index.php">
        <button type="button" class="btn btn-primary">Sair</button>
        <a>
      </div>
    </header>
    </div>

    <h4>Funcionarios Cadastrados</h4>

    <?php
      echo "<table class='content-table'>";
      echo "<thead>";
      echo "<th>Nome</th>";
      echo "<th>Cargo</th>";
      echo "<th>Fone</th>";
      echo "<th>Admissão</th>";
      echo "</thead>";

      while($registro = mysqli_fetch_array($result)){
        $fun_nome = $registro['Nome'];
        $fun_cargo = $registro['Cargo'];
        $fun_fone = $registro['Fone'];
        $fun_data_admissao = $registro['Admissao'];

        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$fun_nome."</td>";
        echo "<td>".$fun_cargo."</td>";
        echo "<td>".$fun_fone."</td>";
        echo "<td>".$fun_data_admissao."</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      mysqli_close($mysqli)
    ?>
    <div>

    </div>

</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>