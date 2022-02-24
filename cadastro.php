<?php
  include('protect.php');
  include('conexao.php');  

  if(isset($_POST['act_cadastro'])){

    $fun_nome = $_POST['fun_nome'];
    $fun_senha = $_POST['fun_senha'];
    $fun_cpf = $_POST['fun_cpf'];
    $fun_cargo = $_POST['fun_cargo'];

    $sql_code = "INSERT INTO funcionario (fun_nome, fun_senha, fun_cpf, fun_status, fun_cargo)
    VALUES ('$fun_nome', '$fun_senha', '$fun_cpf', 'A', '$fun_cargo')";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

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

    </style>

    
    <!-- Custom styles for this template -->
    <link href="cadastro.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  
  
  <div class="container">
    <img ID="imagem" src="assets/img/aquicob.png" width="80" height="80">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"/>
          </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="painel.php" class="nav-link px-2 link-dark">Inicio</a></li>
          <li><a href="cadastro.php" class="nav-link px-2 link-secondary">Cadastrar</a></li>
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

  <form method="POST"> 
        <div class="forms_cadastro">
            <label for="nomeCadastro" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nomeCadastro" placeholder="Nome" name="fun_nome">
        </div>
        
        <div class="forms_cadastro">
            <label for="senhaCadastro" class="form-label">Senha</label>
            <input type="text" class="form-control" id="senhaCadastro" placeholder="Senha" name="fun_senha">
        </div>
        
        <div class="forms_cadastro">
            <label for="cpfCadastro" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpfCadastro" placeholder="CPF" name="fun_cpf">
        </div>
        
        <div class="forms_cadastro">
            <label for="cargoCadastro" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargoCadastro" placeholder="Cargo" name="fun_cargo">
        </div>
        
        <div class="botao_cadastro">
        <button type="submit" class="btn btn-primary mb-3" name='act_cadastro'>Cadastrar</button>
        </div>
    </form> 

</main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
