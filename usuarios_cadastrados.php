<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP - PHP</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .table-title {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .table-title h2 {
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 4px;
            text-align: center;
            font-size: 13px;
            height: 20px;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
            color: black;
        }
        tr:nth-child(even) i {
            color: #585858;
        }
        .table-responsive {
            max-height: 570px;
            overflow-y: auto;
        }

        tr:hover,
        tr:nth-child(even):hover {
            background-color: #d4d4d4;
        }

    </style>
</head>
<body>
    <div class="navbar" style="position:fixed";>
        <ul class="align-items-start">
            <li><a href="index.php"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="usuarios_cadastrados.php"><i class="material-icons" title="Clientes">person</i></a></li>
            <li><a href="produtos_cadastrados.php"><i class="material-icons" title="Produtos">shopping_cart</i></a></li>
            <li><a href="graficos.php"><i class="material-icons" title="Graficos">bar_chart</i></a></li>
            <li><a href=""><i class="material-icons" title="Excluir">attach_money</i></a></li>
            <li><a href=""><i class="material-icons" title="Excluir">sell</i></a></li>
            <li><a href="#"><i class="material-icons" title="Excluir">settings</i></a></li>
            <li><a href="login.php"><i class="material-icons" title="Excluir">exit_to_app</i></a></li>
        </ul>
    </div>
    <div class="content" style="padding-left: 85px;">

        <?php
        require 'config.php';

        function buscarUsuarios($pdo, $termo)
        {
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :termo OR email LIKE :termo OR cidade LIKE :termo");
            $sql->bindValue(':termo', '%' . $termo . '%');
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $lista = [];
        $termoBusca = isset($_GET['termo']) ? $_GET['termo'] : '';

        if (!empty($termoBusca)) {
            $lista = buscarUsuarios($pdo, $termoBusca);
        } else {
            $sql = $pdo->query("SELECT * FROM usuarios");
            if ($sql->rowCount() > 0) {
                $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        $totalLinhas = count($lista);
        $linhasPorPagina = 13;
        $totalPaginas = ceil($totalLinhas / $linhasPorPagina);
        $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $indiceInicial = ($paginaAtual - 1) * $linhasPorPagina;
        $indiceFinal = $indiceInicial + $linhasPorPagina;

        $listaPaginada = array_slice($lista, $indiceInicial, $linhasPorPagina);
        ?>

        <div class="table-title">
            <h2>Clientes</h2>
        </div>

        <div class="pagination-container">
            <div class="search-container">
                <form action="usuarios_cadastrados.php" method="GET">
                    <input type="text" id="searchInput" name="termo" placeholder="Pesquisar..." style="border: 0.8px solid;">
                    <button type="submit" class="btn btn-primary"><i class="material-icons" title="Buscar Cliente">search</i></button>
                    <button type="button" class="btn btn-primary" onclick="location.href='adicionar.php'"><i class="material-icons" title="Adicionar">person_add</i></button>
                </form>
            </div>
            <div class="pagination">
                <?php if ($paginaAtual > 1): ?>
                    <a href="?pagina=<?php echo $paginaAtual - 1; ?>" class="btn btn-sm btn-primary mr-2">&lt;</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <a href="?pagina=<?php echo $i; ?>" class="btn btn-sm btn-primary mr-2"><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if ($paginaAtual < $totalPaginas): ?>
                    <a href="?pagina=<?php echo $paginaAtual + 1; ?>" class="btn btn-sm btn-primary">&gt;</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Idade</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listaPaginada as $usuario): ?>
                        <tr>
                            <td>
                                <?php echo $usuario['id']; ?>
                            </td>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['idade']; ?></td>
                            <td><?php echo $usuario['cpf']; ?></td>
                            <td><?php echo $usuario['cidade']; ?></td>
                            <td class="botao_td">
                                <a href="#" onclick="confirmarExclusao(<?= $usuario['id']; ?>);" style="color: white"><i class="material-icons" title="Excluir">delete</i></a>
                                <a href="editar.php?id=<?= $usuario['id']; ?>" style="color: white"><i class="material-icons" title="Editar">edit</i></a>
                                <a href="exibir.php?id=<?= $usuario['id']; ?>" style="color: white"><i class="material-icons" title="Visualizar">visibility</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if (!empty($termoBusca)): ?>
            <div class="center-button">
                <button class="btn btn-primary" onclick="voltar()">Voltar</button>
            </div>        
        <?php endif; ?>

    </div>

    <div id="confirmModal" class="modal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="close" onclick="fecharModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir este usuário?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="fecharModal()">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="excluirUsuario()">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var paginacaoContainer = document.querySelector(".pagination-container");

        function searchTable() {
            var input, filter, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            tr = document.querySelectorAll("table tbody tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue = txtValue.toUpperCase();

                    if (txtValue.includes(filter)) {
                        tr[i].classList.remove("d-none");
                    } else {
                        tr[i].classList.add("d-none"); 
                    }
                }
            }

            if (filter !== "") {
                paginacaoContainer.style.display = "none";
            } else {
                paginacaoContainer.style.display = "block";
            }
        }

        var usuarioExcluirId = null;

        function confirmarExclusao(id) {
            usuarioExcluirId = id;
            var modal = document.getElementById("confirmModal");
            modal.style.display = "block";
        }

        function fecharModal() {
            var modal = document.getElementById("confirmModal");
            modal.style.display = "none";
        }

        function excluirUsuario() {
            if (usuarioExcluirId !== null) {
                window.location.href = "excluir.php?id=" + usuarioExcluirId + "&confirm=1";
            }
        }

        function voltar() {
            window.location.href = "usuarios_cadastrados.php";
        }
    </script>
</body>
</html>