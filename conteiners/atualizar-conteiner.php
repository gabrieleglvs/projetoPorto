<?php
    include('../conexao.php');

    if(isset($_POST['submit']) && !empty($_POST['tipo']) && !empty($_POST['status']) && !empty($_POST['categoria'])) {

        $id = $_POST['identificador'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];

        $sql_atualizar = "UPDATE conteiners SET tipo_conteiner = '$tipo', status_conteiner = '$status', categoria_conteiner = '$categoria' WHERE id_registro_conteiner = '$id'";

        mysqli_query($conexao, $sql_atualizar);
    
        echo "<script>alert('Registro atualizado com sucesso!')</script>";
    
        header("Refresh: 0; url=selecionar-conteiner.php?id={$id}");

    } else {
        $id = $_POST['identificador'];

        echo "<script>alert('Preencha todos os campos!')</script>";
    
        header("Refresh: 0; url=selecionar-conteiner.php?id={$id}");
    }

   
?>