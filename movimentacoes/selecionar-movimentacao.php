<?php
    include('../conexao.php');

    $id = $_GET['id'];

    $sql_busca = "SELECT id_registro_conteiner, id_mov, tipo_mov, dt_hr_inicio_mov, dt_hr_fim_mov FROM movimentacoes WHERE id_mov = '$id'";

    $busca = mysqli_query($conexao, $sql_busca);

    $resultado = mysqli_fetch_assoc($busca);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar movimentação</title>

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
            <h1>Atualizar movimentação</h1>
            <a href="movimentacao.php?id=<?php echo $resultado['id_registro_conteiner']?>" class="btn btn-dark">Voltar</a>
        </div>

        <form class="container" method="POST" action="atualizar-movimentacao.php">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ID da movimentação</span>
                <input type="text" name="identificador" class="form-control" value="<?php echo $resultado['id_mov'] ?>" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tipo</span>
                <select class="form-select" name="tipo" aria-label="Default select example">
                    <option value="">Selecione...</option>
                    <option value="Embarque" <?php echo $resultado['tipo_mov'] == 'Embarque' ? 'selected' : '' ?> >Embarque</option>
                    <option value="Descarga" <?php echo $resultado['tipo_mov'] == 'Descarga' ? 'selected' : '' ?>>Descarga</option>
                    <option value="Gate in" <?php echo $resultado['tipo_mov'] == 'Gate in' ? 'selected' : '' ?>>Gate in</option>
                    <option value="Gate out" <?php echo $resultado['tipo_mov'] == 'Gate out' ? 'selected' : '' ?>>Gate out</option>
                    <option value="Reposicionamento" <?php echo $resultado['tipo_mov'] == 'Reposicionamento' ? 'selected' : '' ?>>Reposicionamento</option>
                    <option value="Pesagem" <?php echo $resultado['tipo_mov'] == 'Pesagem' ? 'selected' : '' ?>>Pesagem</option>
                    <option value="Scanner" <?php echo $resultado['tipo_mov'] == 'Scanner' ? 'selected' : '' ?>>Scanner</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Data e hora de início</span>
                <input type="datetime-local" name="data-inicio" class="form-control" value="<?php echo $resultado['dt_hr_inicio_mov']?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Data e hora de fim</span>
                <input type="datetime-local" name="data-fim" class="form-control" value="<?php echo $resultado['dt_hr_fim_mov']?>">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Atualizar movimentação">
        </form>
    </main>
</body>

</html>