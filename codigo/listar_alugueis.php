<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aluguéis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
    <header
        class="container-fluid d-flex justify-content-between align-items-center">
        <div class="logo">
            <h2>Sistema de Aluguéis de Veículos</h2>
        </div>
        <div class="user-info text-end">
            <p>Proprietário: Lucas Faria</p>
            <p>Data: 28/11/2024 - 13:55</p>
        </div>
    </header>

    <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="atividades.php">Atividades</a>
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
                            href="formEmprestimo.php">Alugar</a>
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
                                <a class="dropdown-item" href="cadastro_empresa.html">Cadastrar uma Empresa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="cadastro_funcionario.html">Cadastrar um Funcionário</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="cadastro_pessoa.html">Cadastrar uma Pessoa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="cadastro_veiculo.html">Cadastrar um Veículo</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Aluguéis</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Cliente</th>
                        <th>Funcionário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'conexao.php';
                    require_once 'operacoes.php';

                    $alugueis = imprimirAlugueis($conexao);

                    if (!empty($alugueis)) {
                        foreach ($alugueis as $aluguel) {
                            $id_aluguel = $aluguel['id_aluguel'];
                            $datainicial_aluguel = $aluguel['datainicial_aluguel'];
                            $datafinal_aluguel = $aluguel['datafinal_aluguel'];
                            $nome_cliente = $aluguel['nome_cliente'];
                            $nome_funcionario = $aluguel['nome_funcionario'];

                            echo "<tr>";
                            echo "<td>$id_aluguel</td>";
                            echo "<td>$datainicial_aluguel</td>";
                            echo "<td>$datafinal_aluguel</td>";
                            echo "<td>$nome_cliente</td>";
                            echo "<td>$nome_funcionario</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nenhum aluguel encontrado.</td></tr>";
                    }

                    mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Instituto Federal Goiano. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>