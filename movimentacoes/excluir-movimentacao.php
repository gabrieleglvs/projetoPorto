<?php
    include('../conexao.php');

    if(isset($_POST['submit'])) {
        $id = $_GET['id'];

        $sql_excluir = "DELETE FROM movimentacoes WHERE id_mov = '$id'";

        mysqli_query($conexao, $sql_excluir);

        echo "<script>alert('Registro excluído com sucesso!')</script>";
        
        header('Refresh: 0; url=../index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../img/porto.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    SOS Serviços Portuários
                </a>
            </div>
        </nav>
    </header>
    <main>
        <div class="mt-5 card container">
            <h5 class="card-header">Confirmar exclusão da movimentação</h5>
            <div class="card-body">
                <h5 class="card-title">Tem certeza que deseja excluir essa movimentação?</h5>
                <p class="card-text">Excluíndo essa movimentação você também não irá removerá o registro do contêiner.</p>
                <form class="d-flex" method="POST" action="">
                    <input type="submit" name="submit" class="btn btn-danger" value="Excluir">
                    <a href="../index.php" class="btn btn-dark">Cancelar</a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>