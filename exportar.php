<?php 
include('conexao.php');

if(isset($_POST['export'])){
    header('conetent-type: text/csv; charset=utf-8');
    header('content-disposition: attachment; filename=Relatorio.csv');

    $output = fopen("php://output", "w");

    fputcsv($output, array('Nome', 'Dia', 'Hora entrada', 'Inicio Almoco', 'Retorno Almoco', 'Hora Saida'));
    $query = "SELECT fun_nome, fup_data, fup_data_entrada, fup_hora_pausa, fup_hora_retorno, fup_data_saida FROM funcionario_ponto INNER JOIN funcionario ON fun_codigo = fup_fk_fun_codigo";
    $result = mysqli_query($mysqli, $query);

    while($row = mysqli_fetch_assoc($result)){
        fputcsv($output, $row);
    }
    fclose($output);
}
?>