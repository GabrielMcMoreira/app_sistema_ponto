<?php
include('conexao.php');

if (isset($_POST['fun_codigo']) || isset($_POST['fun_senha'])) {

  if (strlen($_POST['fun_codigo']) == 0) {
    echo '<script language="javascript">';
    echo 'alert("Insira seu Id")';
    echo '</script>';
  } else {

    $fun_codigo = $mysqli->real_escape_string($_POST['fun_codigo']);
    $fun_senha = $mysqli->real_escape_string($_POST['fun_senha']);

    $sql_code = "SELECT * FROM funcionario WHERE fun_codigo = '$fun_codigo'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade >= 1) {

      $usuario = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['fun_codigo'] = $usuario['fun_codigo'];
      $_SESSION['fun_nome'] = $usuario['fun_nome'];

      header("Location: painel.php");
    } else {
      echo '<script language="javascript">';
      echo 'alert("Falha ao logar! identificador ou senha incorretos")';
      echo '</script>';
    }
  }
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
  <title>Aquicob - Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="" method="POST">
      <img class="mb-4" src="assets/img/aquicob.png" alt="" width="160" height="160">
      <h1 class="h3 mb-3 fw-normal">Login</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="ID" name="fun_codigo">
        <label for="floatingInput">ID</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021–2021</p>
    </form>
  </main>



</body>

</html>