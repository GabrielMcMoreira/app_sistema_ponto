<?php
include('protect.php');
include('conexao.php');

date_default_timezone_set('america/sao_paulo');

$buscaNome = '';
$buscaDataInicial = "AND fup_data >= '" . date("Y-m-d") . " 00:00:00'";
$buscaDataFinal = '';
if (isset($_POST['pesquisaNome'])) {
  $nomeBusca = $_POST['pesquisaNome'];

  if ($nomeBusca != '') {
    $buscaNome .= " AND fun_nome LIKE '%{$nomeBusca}%'";
  }
}
if (isset($_POST['pesquisaDataInicial'])) {
  $dataInicial = $_POST['pesquisaDataInicial'];
  if ($dataInicial != '') {
    $buscaDataInicial = " AND fup_data >= '{$dataInicial}'";
  }
}
if (isset($_POST['pesquisaDataFinal'])) {
  $dataFinal = $_POST['pesquisaDataFinal'];
  if ($dataFinal != '') {
    $buscaDataFinal = "AND fup_data >= '{$buscaDataFinal} 23:59:59'";
  }
}

$sql = "SELECT fun_nome, fup_data, fup_data_entrada, fup_hora_pausa, fup_hora_retorno, fup_data_saida 
          FROM funcionario_ponto 
          INNER JOIN funcionario ON fup_fk_fun_codigo = fun_codigo
          WHERE 1 = 1
          {$buscaNome}
          {$buscaDataInicial}
          {$buscaDataFinal}";

$query = mysqli_query($mysqli, $sql) or die("Erro ao tentar exibir" . "<br><br>" . $mysqli->error);
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

      .caixa_pesquisa {
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
      <img ID="imagem" src="aquicob.png" width="80" height="80">
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
          <label for="exampleFormControlInput1" class="form-label"></label>
          <br>
          <input type="text" name="pesquisaNome" class="caixa_pesquisa" placeholder="Nome" value=""><br>
          <label for="exampleFormControlInput1" class="form-label">Data inicial:</label>
          <label for="exampleFormControlInput1" class="form-label"></label>
          <input type="date" name="pesquisaDataInicial" class="caixa_pesquisa" placeholder="Data inicial" value=""><br>
          <label for="exampleFormControlInput1" class="form-label">Data Final:</label>
          <label for="exampleFormControlInput1" class="form-label"></label>
          <input type="date" name="pesquisaDataFinal" class="caixa_pesquisa" placeholder="Data Final" value=""><br>
          <br><input type="submit" value="Pesquisar" class="btn btn-primary" name="pesquisar" />
        </div>
      </form>
      <?php
      echo "<table class='content-table'>";
      echo "<thead>";
      echo "<th>Nome</th>";
      echo "<th>Data</th>";
      echo "<th>Hora Entrada</th>";
      echo "<th>Inicio Almoço</th>";
      echo "<th>Retorno Almoço</th>";
      echo "<th>Saida Saida</th>";
      echo "</thead>";

      while ($registro = mysqli_fetch_array($query)) {

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $registro['fun_nome'] . "</td>";
        echo "<td>" . $registro['fup_data'] . "</td>";
        echo "<td>" . $registro['fup_data_entrada'] . "</td>";
        echo "<td>" . $registro['fup_hora_pausa'] . "</td>";
        echo "<td>" . $registro['fup_hora_retorno'] . "</td>";
        echo "<td>" . $registro['fup_data_saida'] . "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      mysqli_close($mysqli)
      ?>
    </div>
    <form method="POST" action="exportar.php">
      <input type="submit" name="export" value="Exportar" class="btn btn-primary" />
    </form>
  </main>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>