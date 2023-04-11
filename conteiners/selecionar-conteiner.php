<?php
    include('../conexao.php');

    $id = $_GET['id'];

    $sql_busca = "SELECT * FROM conteiners WHERE id_registro_conteiner = '$id'";

    $busca = mysqli_query($conexao, $sql_busca);

    $resultado = mysqli_fetch_assoc($busca);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar registro do contêiner</title>

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
        <div class="container d-flex justify-content-between align-items-center mt-5">
            <h1>Atualizar registro do contêiner</h1>
            <a href="../index.php" class="btn btn-dark">Voltar</a>
        </div>

        <form class="container mt-3" method="POST" action="atualizar-conteiner.php">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ID do registro</span>
                <input type="text" name="identificador" class="form-control" value="<?php echo $resultado['id_registro_conteiner']?>" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Cliente</span>
                <input type="text" name="cliente" class="form-control" value="<?php echo $resultado['nm_cliente_conteiner']?>" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nº do contêiner</span>
                <input type="text" name="conteiner" class="form-control" value="<?php echo $resultado['cd_conteiner']?>" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tipo</span>
                <select class="form-select" name="tipo" aria-label="Default select example">
                    <option value="" >Selecione...</option>
                    <option value="20" <?php echo $resultado['tipo_conteiner'] == '20' ? 'selected' : '' ?> >20</option>
                    <option value="40" <?php echo $resultado['tipo_conteiner'] == '40' ? 'selected' : '' ?> >40</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Status</span>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value='' >Selecione...</option>
                    <option value="Cheio" <?php echo $resultado['status_conteiner'] == 'Cheio' ? 'selected' : '' ?> >Cheio</option>
                    <option value="Vazio" <?php echo $resultado['categoria_conteiner'] == 'Vazio' ? 'selected' : '' ?> >Vazio</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Categoria</span>
                <select class="form-select" name="categoria" aria-label="Default select example">
                    <option value="" >Selecione...</option>
                    <option value="Importação" <?php echo $resultado['categoria_conteiner'] == 'Importação' ? 'selected' : '' ?> >Importação</option>
                    <option value="Exportação" <?php echo $resultado['categoria_conteiner'] == 'Exportação' ? 'selected' : '' ?> >Exportação</option>
                </select>
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Atualizar">
        </form>

</body>

</html>