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
    </style>
</head>
<body>
    <div class="navbar" style="position:fixed";>
        <ul class="align-items-start">
            <li><a href="index.php"><i class="material-icons">home</i></a></li>
            <li><a href="usuarios_cadastrados.php"><i class="material-icons">person</i></a></li>
            <li><a href="produtos_cadastrados.php"><i class="material-icons">shopping_cart</i></a></li>
            <li><a href="graficos.php"><i class="material-icons">bar_chart</i></a></li>
            <li><a href=""><i class="material-icons">attach_money</i></a></li>
            <li><a href=""><i class="material-icons">sell</i></a></li>
            <li><a href="#"><i class="material-icons">settings</i></a></li>
            <li><a href="login.php"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
    </div>
    <div class="content">
        <div class="form-container" style="margin-left: 350px; margin-top: 80px;">
        <form class="form" action="adicionar_action.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nome</label>
                        <input type="nome" class="form-control" id="nome" name="nome"placeholder="nome">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Idade</label>
                    <input type="idade" class="form-control col-md-8" id="idade" name="idade" placeholder="idade">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">CPF</label>
                    <input type="text" class="form-control col-md-8 cpf" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx">
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <select class="form-control" id="cidade" name="cidade">
                        <option selected>Selecione uma cidade</option>
                        <option value="Santo Antonio da Patrulha">Santo Antonio da Patrulha</option>
                        <option value="Osorio">Osorio</option>
                        <option value="Tramandai">Tramandai</option>
                        <option value="Gravatai">Gravatai</option>
                        <!-- Adicione mais opÃ§Ãµes de cidade conforme necessÃ¡rio -->
                    </select>
                </div>
                    <!-- <div class="form-group col-md-2">
                        <label for="inputEstado">Estado</label>
                        <select id="inputEstado" class="form-control">
                            <option selected>Escolher...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group col-md-6">
                        <label for="inputCEP">CEP</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">Telefone</label>
                        <input type="text" class="form-control" id="inputTel">
                    </div> -->
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="checkbox" id="gridCheck"> -->
                        <!-- <label class="form-check-label" for="gridCheck">
                            Clique em mim
                        </label> -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-primary" onclick="location.href='usuarios_cadastrados.php'">Voltar</button>
            </form>
        </div>
    </div>
    <script>
        const inputCpf = document.querySelector(".cpf");
            inputCpf.addEventListener("input", function (e) {
                e.target.value = formatCPF(e.target.value);
            });

            function formatCPF(cpf) {
                cpf = cpf.replace(/\D/g, "");

                if (cpf.length > 11) {
                    cpf = cpf.slice(0, 11);
                }

                if (cpf.length > 9) {
                    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
                } else if (cpf.length > 6) {
                    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})/, "$1.$2.$3");
                } else if (cpf.length > 3) {
                    cpf = cpf.replace(/(\d{3})(\d{3})/, "$1.$2");
                }
                return cpf;
            }
    </script>
</body>
</html>