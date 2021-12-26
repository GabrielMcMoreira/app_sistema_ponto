<?php
include('protect.php');
include('conexao.php');

$fup_fk_fun_codigo = $_SESSION['fun_codigo'];
date_default_timezone_set("America/Sao_Paulo");
$data_hoje = date("Y/m/d");

$sql_code = "SELECT * FROM funcionario_ponto WHERE fup_fk_fun_codigo = '$fup_fk_fun_codigo' AND fup_data = '$data_hoje' ";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantidade = $sql_query->num_rows;
$ponto_func = $sql_query->fetch_assoc();

(isset($ponto_func['fup_data_entrada'])) ? $entrada = $ponto_func['fup_data_entrada'] : $entrada = 'Entrada';
(isset($ponto_func['fup_hora_pausa'])) ? $pausa = $ponto_func['fup_hora_pausa'] : $pausa = 'Pausa';
(isset($ponto_func['fup_hora_pausa'])) ? $almoco = 'Retorno' : $almoco = 'Pausa';
(isset($ponto_func['fup_hora_retorno'])) ? $retorno = $ponto_func['fup_hora_retorno'] : $retorno = 'Retorno';
(isset($ponto_func['fup_data_saida'])) ? $saida = $ponto_func['fup_data_saida'] : $saida = 'Saida';

$mensagemRetorno = " ";
if (isset($ponto_func['fup_hora_pausa'])) {

  $horaRetorno = strtotime($ponto_func['fup_hora_pausa']) + 4500; //hora atual + 1h15 (4500segundos)
  $horaRetornoFormatada = strftime('%H:%M', $horaRetorno);
  $mensagemRetorno = "<strong>Previsão</strong> de retorno: {$horaRetornoFormatada}";
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['entrar'])) {

  if ($quantidade == 0) {
    $sql_code = "INSERT INTO funcionario_ponto (fup_fk_fun_codigo, fup_data_entrada, fup_data) VALUES ('$fup_fk_fun_codigo', now(), '$data_hoje')";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
  } else {
    echo '<script language="javascript">';
    echo 'alert("Erro ao registrar entrada!")';
    echo '</script>';
  }
  header("Refresh: 0");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['almoco'])) {

  if (!isset($ponto_func['fup_hora_pausa'])) {

    $sql_code = "UPDATE funcionario_ponto SET fup_hora_pausa = now() WHERE fup_fk_fun_codigo = $fup_fk_fun_codigo AND fup_data = '$data_hoje'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $almoco = 'Retorno';
    header("Refresh: 0");
  } elseif (!isset($ponto_func['fup_hora_retorno'])) {

    $sql_code = "UPDATE funcionario_ponto SET fup_hora_retorno = now() WHERE fup_fk_fun_codigo = $fup_fk_fun_codigo AND fup_data = '$data_hoje'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
  } else {
    echo '<script language="javascript">';
    echo 'alert("Erro ao cadastrar Pausa/Retorno!")';
    echo '</script>';
  }
  header("Refresh: 0");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sair'])) {

  if (!isset($ponto_func['fup_data_saida'])) {

    $sql_code = "UPDATE funcionario_ponto SET fup_data_saida = now() WHERE fup_fk_fun_codigo = $fup_fk_fun_codigo AND fup_data = '$data_hoje'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
  } else {
    echo '<script language="javascript">';
    echo 'alert("Erro ao cadastrar saida!")';
    echo '</script>';
  }
  header("Refresh: 0");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Painel - Aquicob</title>
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

    .cont {
      height: 200px;
      position: relative;
    }

    .center {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .btn-outline-primary {
      width: 85px;
      height: 38px;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="headers.css" rel="stylesheet">

</head>

<body>

  <main>


    <div class="container">
      <img ID="imagem" src="assets/img/aquicob.png" width="80" height="80">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="painel.php" class="nav-link px-2 link-secondary">Inicio</a></li>
          <li><a href="cadastro.php" class="nav-link px-2 link-dark">Cadastrar</a></li>
          <li><a href="relatorio.php" class="nav-link px-2 link-dark">Relatório</a></li>
          <li><a href="funcionarios.php" class="nav-link px-2 link-dark">Funcionários</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <a href="index.php">
            <button type="button" class="btn btn-primary">Sair</button>
          </a>
        </div>
      </header>
    </div>

    <div class="cont" style="height:80px">
      <div class="center">
        <br>
        <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-check-outlined" style="pointer-events: none"><?php echo $entrada; ?> </label>

        <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-check-outlined" style="pointer-events: none"><?php echo $pausa; ?> </label>

        <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-check-outlined" style="pointer-events: none"><?php echo $retorno; ?> </label>

        <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-check-outlined" style="pointer-events: none"><?php echo $saida; ?> </label><br>
        <p><?php echo $mensagemRetorno; ?></p>
      </div>
    </div>


    <form action="" method="POST">
      <div class="cont">
        <div class="center">
          <button type="submit" class="btn btn-success" style="width:80px; color:black;" name="entrar">Entrar</button>

          <button type="submit" class="btn btn-warning" style="width:80px" name="almoco"> <?php echo $almoco; ?> </button>

          <button type="submit" class="btn btn-danger" style="width:80px; color:black;" name="sair">Sair</button>
        </div>
      </div>
    </form>


  </main>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>