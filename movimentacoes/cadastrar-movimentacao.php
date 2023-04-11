<?php
    include('../conexao.php');

    if(isset($_POST['submit']) && !empty($_POST['tipo']) && !empty($_POST['data-inicio']) && !empty($_POST['data-fim'])) {

        $id = $_POST['identificador'];
        $cliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $dataInicio = $_POST['data-inicio'];
        $dataFim = $_POST['data-fim'];

        $sql_inserir = "INSERT INTO movimentacoes(id_registro_conteiner, nm_cliente_mov, tipo_mov, dt_hr_inicio_mov, dt_hr_fim_mov) VALUES('$id', '$cliente', '$tipo', '$dataInicio', '$dataFim')";

        mysqli_query($conexao, $sql_inserir);

        echo "<script>alert('Movimentação cadastrada com sucesso!')</script>";

        header("Refresh: 0; url=movimentacao.php?id={$id}");
    } else {
        $id = $_POST['identificador'];

        echo "<script>alert('Preencha todos os campos!')</script>";

        header("Refresh: 0; url=movimentacao.php?id={$id}");
    }
?>