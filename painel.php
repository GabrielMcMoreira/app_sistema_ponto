<?php
  include('protect.php');
  include('conexao.php');  
  
  $relogio_pes_fk_cod = $_SESSION['pes_codigo'];
  date_default_timezone_set("America/Sao_Paulo");
  $data_hoje = date("Y/m/d");

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sair'])){

    
    $sql_code = "SELECT * FROM relogio WHERE relogio_pes_fk_cod = '$relogio_pes_fk_cod' AND relogio_data = '$data_hoje' ";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    
    $quantidade = $sql_query->num_rows;
    
    if($quantidade == 1){
      
      $sql_code = "UPDATE relogio SET relogio_sai = now() WHERE relogio_pes_fk_cod = $relogio_pes_fk_cod ";   
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    }
  }
  
  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['entrar'])){
  
    $sql_code = "SELECT * FROM relogio WHERE relogio_pes_fk_cod = '$relogio_pes_fk_cod' AND relogio_data = '$data_hoje' ";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    
    $quantidade = $sql_query->num_rows;
    
    if($quantidade == 0){
      $sql_code = "INSERT INTO relogio (relogio_pes_fk_cod, relogio_ent) VALUES ('$relogio_pes_fk_cod', now())";
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    }
  }

  /*if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['almoco'])){
  
    $sql_code = "INSERT INTO relogio (relogio_pes_fk_cod, relogio_ent) VALUES ('$relogio_pes_fk_cod', now())";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
  }*/


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Headers · Bootstrap v5.0</title>
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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">

  </head>
  <body>
    
<main>
  
  
  <div class="container">
  <img ID="imagem" src="assets/images/aquicob.png" width="80" height="80">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="painel.php" class="nav-link px-2 link-secondary">Inicio</a></li>
        <li><a href="cadastro.php" class="nav-link px-2 link-dark">Cadastrar</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Relatório</a></li>
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
      <button type="button" class="btn btn-success" style="width:300px;">Status</button>
    </div>
  </div>

  
  <form action="" method="POST">
    <div class="cont">
      <div class="center">
          <button type="submit" class="btn btn-success" style="width:68px" name="entrar">Entrar</button>
          
          <button type="button" class="btn btn-warning" style="width:68px" name="almoco">Pausa</button>
          
          <!--<button type="button" class="btn btn-info">Voltar</button>-->
          
          <button type="submit" class="btn btn-danger" style="width:68px" name="sair">Sair</button>
        </div>
      </div>
    </form>
  

</main>
  

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
