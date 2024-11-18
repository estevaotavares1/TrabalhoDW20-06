<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css">
</head>

<body>
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
        <h2 class="text-center mb-4">Lista de Funcionários</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'conexao.php';
                    require_once 'operacoes.php';

                    $funcionarios = imprimirFuncionarios($conexao);

                    if (!empty($funcionarios)) {
                        foreach ($funcionarios as $funcionario) {
                            $id_funcionario = $funcionario['id_funcionario'];
                            $nome_funcionario = $funcionario['nome_funcionario'];
                            $cpf_funcionario = $funcionario['cpf_funcionario'];
                            $email_funcionario = $funcionario['email_funcionario'];
                            $telefone_funcionario = $funcionario['telefone_funcionario'];
                            $senha_funcionario = $funcionario['senha_funcionario'];

                            echo "<tr>";
                            echo "<td>$id_funcionario</td>";
                            echo "<td>$nome_funcionario</td>";
                            echo "<td>$cpf_funcionario</td>";
                            echo "<td>$email_funcionario</td>";
                            echo "<td>$telefone_funcionario</td>";
                            echo "<td>$senha_funcionario</td>";
                            echo "<td>
                                    <a href='editar_funcionario.php?id_funcionario=$id_funcionario' class='btn btn-warning btn-sm'>Editar</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nenhum funcionário encontrado.</td></tr>";
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