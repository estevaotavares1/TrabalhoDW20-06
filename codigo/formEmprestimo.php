<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Empréstimo</title>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header
        class="container-fluid d-flex justify-content-between align-items-center">
        <div class="logo">
            <h2>Sistema de Aluguéis de Veículos</h2>
        </div>
        <div class="user-info text-end">
            <a href="http://lattes.cnpq.br/3766134688368012" target="_blank" class="text-decoration-none">Proprietário: Lucas Faria</a>
            <p>Data: 28/11/2024 - 13:55</p>
        </div>
    </header>

    <nav class="navbar navbar-dark navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            aria-current="page"
                            href="atividades.php">Ações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formEmprestimo.php">Alugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagamento_clienteSelect.php">Pagar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Registros
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="listar_alugueis.php">Listar Aluguéis</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="listar_clientes.php">Listar Clientes</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="listar_funcionarios.php">Listar Funcionários</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="listar_pagamentos.php">Listar Pagamentos</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="listar_veiculos.php">Listar Veículos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="cadastro_empresa.php">Cadastrar uma Empresa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="cadastro_funcionario.php">Cadastrar um Funcionário</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="cadastro_pessoa.php">Cadastrar uma Pessoa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="cadastro_veiculo.php">Cadastrar um Veículo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a id="deslogar" class="nav-link" href="deslogar.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulário de Empréstimo</h2>
        <form id="emprestimo" action="formSelecionarVeiculos.php" method="GET">
            <div class="mb-3">
                <label for="datainicial_aluguel" class="form-label">Data Inicial do Empréstimo</label>
                <input type="date" id="datainicial_aluguel" name="datainicial_aluguel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="datafinal_aluguel" class="form-label">Data Final do Empréstimo</label>
                <input type="date" id="datafinal_aluguel" name="datafinal_aluguel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="id_funcionario" class="form-label">Funcionário</label>
                <select name="id_funcionario" id="id_funcionario" class="form-select" required>
                    <?php
                    require_once "conexao.php";
                    require_once "operacoes.php";

                    $funcionarios = listarFuncionarios($conexao);

                    foreach ($funcionarios as $funcionario) {
                        $id_funcionario = $funcionario['id_funcionario'];
                        $nome_funcionario = $funcionario['nome_funcionario'];
                        echo "<option value='$id_funcionario'>$nome_funcionario</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select name="id_cliente" id="id_cliente" class="form-select" required>
                    <?php
                    $clientes = listarClientes($conexao);

                    foreach ($clientes as $cliente) {
                        $id_cliente = $cliente['id_cliente'];
                        $nome = $cliente['nome'];
                        echo "<option value='$id_cliente'>$nome</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="text-center">
                <input type="submit" value="Selecionar veículos" class="btn btn-primary">
            </div>
        </form>
        <div class="text-center">
            <a href="atividades.php" class="btn btn-primary mt-3">Voltar a Página de Atividades</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Instituto Federal Goiano. Todos os direitos reservados.</p>
    </footer>

    <script>
        $(document).ready(function() {
            var dataAtual = new Date().toISOString().split("T")[0];
            $("#datainicial_aluguel").attr("min", dataAtual);

            jQuery.validator.addMethod(
                "dataFinalMaiorQueInicial",
                function(value, element) {
                    var dataInicial = $("#datainicial_aluguel").val();
                    return (
                        this.optional(element) ||
                        new Date(value) >= new Date(dataInicial)
                    );
                },
                "A data final não pode ser anterior à data inicial."
            );

            $("#emprestimo").validate({
                rules: {
                    datainicial_aluguel: {
                        required: true,
                        date: true,
                    },
                    datafinal_aluguel: {
                        required: true,
                        date: true,
                        dataFinalMaiorQueInicial: true,
                    }
                },
                messages: {
                    datainicial_aluguel: {
                        required: "A data inicial do empréstimo é obrigatória.",
                        date: "Por favor, insira uma data válida.",
                    },
                    datafinal_aluguel: {
                        required: "A data final do empréstimo é obrigatória.",
                        date: "Por favor, insira uma data válida.",
                        dataFinalMaiorQueInicial: "A data final não pode ser anterior à data inicial.",
                    }
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>