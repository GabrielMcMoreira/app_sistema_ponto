<?php
  include('protect.php');
  include('conexao.php');

  $sql = "SELECT fun_nome, fup_data_entrada, fup_data_saida FROM funcionario_ponto INNER JOIN funcionario ON fup_fk_fun_codigo = fun_codigo";

  if(isset($_POST['pesquisaNome'])){
    $dadoBusca = $_POST['pesquisaNome'];
    $sql .= " WHERE fun_nome LIKE '%{$dadoBusca}%'";
  }
  $query = mysqli_query($mysqli, $sql) or die("Erro ao tentar exibir"."<br><br>". $mysqli->error);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Relatorio - Aquicob</title>
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

        .caixa_pesquisa{
            display: flexbox;
            align-items: center;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="relatorio.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  
  
  <div class="container">
    <img ID="imagem" src="assets/img/aquicob.png" width="80" height="80">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"></svg>
    </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="painel.php" class="nav-link px-2 link-dark">Inicio</a></li>
        <li><a href="cadastro.php" class="nav-link px-2 link-dark">Cadastrar</a></li>
        <li><a href="relatorio.php" class="nav-link px-2 link-secondary">Relatório</a></li>
        <li><a href="funcionarios.php" class="nav-link px-2 link-dark">Funcionários</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="index.php">
        <button type="button" class="btn btn-primary">Sair</button>
        </a>
      </div>
    </header>
    </div>
    
    <div>

      <h4>Relatório de busca</h4>
      <form method="POST" action="relatorio.php"><br>
      <div class="caixa_cadastro">
        <label for="exampleFormControlInput1" class="form-label">Por nome:</label>
        <label for="exampleFormControlInput1" class="form-label">Por data:</label>
        <br>
        <input type="text" name="pesquisaNome" class="caixa_pesquisa" placeholder="Nome" value="">
        <input type="date" name="pesquisaInicial" class="caixa_pesquisa" placeholder="Data inicial">
        <input type="date" name="pesquisaFinal" class="caixa_pesquisa" placeholder="Data final">
        <br><input type="submit" value="Pesquisar" class="btn btn-primary" name="pesquisar"/>
      </div> 
      </form>

      <?php
      echo "<table class='content-table'>";
      echo "<thead>";
      echo "<th>Nome</th>";
      echo "<th>Data Entrada</th>";
      echo "<th>Data Saida</th>";
      echo "</thead>";

      while($registro = mysqli_fetch_array($query)){
        //$fun_nome = $registro['Nome'];
        //$fup_data_entrada = $registro['Entrada'];
        //$fup_data_saida = $registro['Saida'];

        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$registro['fun_nome']."</td>";
        echo "<td>".$registro['fup_data_entrada']."</td>";
        echo "<td>".$registro['fup_data_saida']."</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      mysqli_close($mysqli)
    ?>
    </div>
</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>