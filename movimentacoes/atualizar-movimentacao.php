<?php
    include('../conexao.php');

    if(isset($_POST['submit']) && !empty($_POST['tipo']) && !empty($_POST['data-inicio']) && !empty($_POST['data-fim'])) {

        $id = $_POST['identificador'];
        $tipo = $_POST['tipo'];
        $dataInicio = $_POST['data-inicio'];
        $dataFim = $_POST['data-fim'];

        $sql_atualizar = "UPDATE movimentacoes SET tipo_mov = '$tipo', dt_hr_inicio_mov = '$dataInicio', dt_hr_fim_mov = '$dataFim' WHERE id_mov = '$id'";

        mysqli_query($conexao, $sql_atualizar);
    
        echo "<script>alert('Movimentação atualizada com sucesso!')</script>";
    
        header("Refresh: 0; url=selecionar-movimentacao.php?id={$id}");

    } else {
        $id = $_POST['identificador'];

        echo "<script>alert('Preencha todos os campos!')</script>";
    
        header("Refresh: 0; url=selecionar-movimentacao.php?id={$id}");
    }

   
?>