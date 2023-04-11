<?php
    include('../conexao.php');

    if(isset($_POST['submit']) && !empty($_POST['cliente']) && !empty($_POST['conteiner']) && !empty($_POST['tipo']) && !empty($_POST['status']) && !empty($_POST['categoria'])) {

        if(strlen($_POST['conteiner']) != 11) {
            echo "<script>alert('O campo Nº do contêiner deve conter 11 caracteres. 4 letras e 7 números. Ex: TEST1234567, por favor redigite as informações de forma correta!')</script>";

            header('Refresh: 0; url=../index.php'); 
        } else {

            $cliente = $_POST['cliente'];
            $conteiner = $_POST['conteiner'];
            $tipo = $_POST['tipo'];
            $status = $_POST['status'];
            $categoria = $_POST['categoria'];

            $sql_inserir = "INSERT INTO conteiners(nm_cliente_conteiner, cd_conteiner, tipo_conteiner, status_conteiner, categoria_conteiner) VALUES('$cliente', '$conteiner', '$tipo', '$status', '$categoria')";

            mysqli_query($conexao, $sql_inserir);

            echo "<script>alert('Contêiner cadastrado com sucesso!')</script>";

            header('Refresh: 0; url=../index.php');
        }

    } else {
        echo "<script>alert('Preencha todos os campos!')</script>";

        header('Refresh: 0; url=../index.php');
    }
?>