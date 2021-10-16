<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['fun_codigo'])){
    die(include('acesso_negado.php'));
}
?>

