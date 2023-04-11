<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Serviços Portuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/porto.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    SOS Serviços Portuários
                </a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-5 d-flex justify-content-between align-items-center">
            <h1>Painel de controle</h1>
            <a href="#" class="btn btn-danger">Sair</a>
        </div>

        <h2 class="container mt-3">Cadastrar contêiner</h2>

        <form class="container" method="POST" action="conteiners/cadastrar-conteiner.php">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Cliente</span>
                <input type="text" name="cliente" class="form-control" placeholder="Digite a Razão Social do cliente">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nº do contêiner</span>
                <input type="text" name="conteiner" class="form-control" placeholder="TEST1234567">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tipo</span>
                <select class="form-select" name="tipo" aria-label="Default select example">
                    <option value="" selected>Selecione...</option>
                    <option value="20">20</option>
                    <option value="40">40</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Status</span>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="" selected>Selecione...</option>
                    <option value="Cheio">Cheio</option>
                    <option value="Vazio">Vazio</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Categoria</span>
                <select class="form-select" name="categoria" aria-label="Default select example">
                    <option value="" selected>Selecione...</option>
                    <option value="Importação">Importação</option>
                    <option value="Exportação">Exportação</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Cadastrar" class="btn btn-success">
        </form>

        <hr>

        <div class="container mt-3 d-flex justify-content-between align-items-center">
            <h2>Confira o relatório de movimentação, importação e exportação</h2>
            <a href="relatorio.php" class="btn btn-warning">Gerar relatório</a>
        </div>

        <hr>

        <h2 class="container mt-5">Contêiners cadastrados</h2>

        <div class="container">
            <table id="tabela-conteiner" class="container table">
                <thead>
                    <tr>
                        <th scope="col">ID DO REGISTRO</th>
                        <th scope="col">CLIENTE</th>
                        <th scope="col">Nº DO CONTEINER</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">ALTERAR</th>
                        <th scope="col">EXCLUIR</th>
                        <th scope="col">MOVIMENTAÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('conexao.php');

                    $sql_busca = "SELECT * FROM conteiners";
                    $busca = mysqli_query($conexao, $sql_busca);

                    while ($resultado = mysqli_fetch_assoc($busca)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $resultado['id_registro_conteiner'] ?></th>
                            <td><?php echo $resultado['nm_cliente_conteiner'] ?></td>
                            <td><?php echo $resultado['cd_conteiner'] ?></td>
                            <td><?php echo $resultado['tipo_conteiner'] ?></td>
                            <td><?php echo $resultado['status_conteiner'] ?></td>
                            <td><?php echo $resultado['categoria_conteiner'] ?></td>
                            <td>
                                <a href="conteiners/selecionar-conteiner.php?id=<?php echo $resultado['id_registro_conteiner'] ?>" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="conteiners/excluir-conteiner.php?id=<?php echo $resultado['id_registro_conteiner'] ?>" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="movimentacoes/movimentacao.php?id=<?php echo $resultado['id_registro_conteiner'] ?>" class="btn btn-info">Movimentações</a>
                            </td>
                        </tr>

                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabela-conteiner').DataTable({
                language: {
                    lengthMenu: 'Exibindo _MENU_ registros por página',
                    zeroRecords: 'Nenhum registro encontrado',
                    info: 'Mostrando página _PAGE_ de _PAGES_',
                    infoEmpty: 'Nenhum registro disponínel',
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
        });
    </script>

</body>

</html>