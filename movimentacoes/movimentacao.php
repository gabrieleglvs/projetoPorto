<?php
include('../conexao.php');

$id = $_GET['id'];

$sql_busca = "SELECT id_registro_conteiner, nm_cliente_conteiner, cd_conteiner FROM conteiners WHERE id_registro_conteiner = '$id'";

$busca = mysqli_query($conexao, $sql_busca);

$resultado = mysqli_fetch_assoc($busca);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <h1>Movimentações</h1>
            <a href="../index.php" class="btn btn-dark">Voltar</a>
        </div>

        <h2 class="container mt-3">Informações do contêiner<h2>

        <form class="container" method="POST" action="cadastrar-movimentacao.php">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ID do registro</span>
                <input type="text" name="identificador" class="form-control" value="<?php echo $resultado['id_registro_conteiner'] ?>" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Cliente</span>
                    <input type="text" name="cliente" class="form-control" value="<?php echo $resultado['nm_cliente_conteiner'] ?>" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nº do contêiner</span>
                <input type="text" name="conteiner" class="form-control" value="<?php echo $resultado['cd_conteiner'] ?>" readonly>
            </div>

            <hr>

            <h2 class="container mt-3">Cadastrar movimentação</h2>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tipo</span>
                <select class="form-select" name="tipo" aria-label="Default select example">
                    <option selected>Selecione...</option>
                    <option value="Embarque">Embarque</option>
                    <option value="Descarga">Descarga</option>
                    <option value="Gate in">Gate in</option>
                    <option value="Gate out">Gate out</option>
                    <option value="Reposicionamento">Reposicionamento</option>
                    <option value="Pesagem">Pesagem</option>
                    <option value="Scanner">Scanner</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Data e hora de início</span>
                <input type="datetime-local" name="data-inicio" class="form-control">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Data e hora de fim</span>
                <input type="datetime-local" name="data-fim" class="form-control">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Cadastrar movimentação">
        </form>

        <hr>

        <h2 class="container mt-5">Movimentações cadastradas</h2>

        <div class="container">
        <table id="tabela-movimentacoes" class="container table">
            <thead>
                <tr>
                    <th scope="col">ID DA MOVIMENTAÇÃO</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">Nº DO CONTÊINER</th>
                    <th scope="col">TIPO DE MOVIMENTAÇÃO</th>
                    <th scope="col">DATA E HORA INICIAL</th>
                    <th scope="col">DATA E HORA FINAL</th>
                    <th scope="col">ALTERAR</th>
                    <th scope="col">EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include('../conexao.php');

                $id = $_GET['id'];

                $sql_busca = "SELECT m.id_mov, c.nm_cliente_conteiner, c.cd_conteiner, m.tipo_mov, m.dt_hr_inicio_mov, m.dt_hr_fim_mov FROM movimentacoes m, conteiners c WHERE c.id_registro_conteiner = '$id' AND m.id_registro_conteiner = '$id'";

                $busca = mysqli_query($conexao, $sql_busca);

                while ($resultado = mysqli_fetch_assoc($busca)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $resultado['id_mov'] ?></th>
                    <td><?php echo $resultado['nm_cliente_conteiner'] ?></td>
                    <td><?php echo $resultado['cd_conteiner'] ?></td>
                    <td><?php echo $resultado['tipo_mov'] ?></td>
                    <td><?php echo $resultado['dt_hr_inicio_mov'] ?></td>
                    <td><?php echo $resultado['dt_hr_fim_mov'] ?></td>
                    <td>
                            <a href="selecionar-movimentacao.php?id=<?php echo $resultado['id_mov']?>" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="excluir-movimentacao.php?id=<?php echo $resultado['id_mov']?>" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>

    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#tabela-movimentacoes').DataTable({
                    language: {
                        lengthMenu: 'Exibindo _MENU_ registros por página',
                        zeroRecords: 'Nenhum registro encontrado',
                        info: 'Mostrando _PAGE_ de _PAGES_',
                        infoEmpty: 'Nenhum registro disponível',
                        infoFiltered: '(Filtrado de _MAX_ registros totais)',
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último",
                        }
                    },
                });
            })
        </script>
</body>

</html>