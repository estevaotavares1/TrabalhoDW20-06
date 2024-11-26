<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon/icone.ico" type="image/x-icon">
    <title>Funcionamento do Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <audio id="audio-background" autoplay loop>
        <source src="music/eleve_minha_nota.mp3" type="audio/mp3">
        Seu navegador não suporta o formato de áudio.
    </audio>

    <header class="container-fluid d-flex justify-content-between align-items-center">
        <div class="logo d-flex align-items-center">
            <img src="img/logo.png" alt="Logo" class="logo-img me-2">
            <h2>Vrum Vrum Aluguéis</h2>
        </div>
        <div class="user-info text-end">
            <a href="http://lattes.cnpq.br/3766134688368012" target="_blank" class="text-decoration-none">Funcionário:
                <?php echo $nomeFuncionario; ?></a>
            <p>Data: <?php echo $dataAtual; ?></p>
        </div>
    </header>

    <nav class="navbar navbar-dark navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="atividades.php">Ações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formEmprestimo.php">Alugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagamento_clienteSelect.php">Pagar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
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
        <section>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Sobre o Sistema</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Desenvolvido para funcionários de uma locadora de veículos.
                                </li>
                                <li class="list-group-item">Os aluguéis sempre são realizados de forma presencial.</li>
                                <li class="list-group-item">Apenas carros estão disponíveis para aluguel.</li>
                                <li class="list-group-item">O sistema apenas registra todas essas informações.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Clientes e Veículos</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Os clientes podem ser pessoas físicas ou empresas.</li>
                                <li class="list-group-item">Clientes tem uma ficha com dados detalhados.</li>
                                <li class="list-group-item">Um cliente pode alugar mais de um veículo simultaneamente.
                                </li>
                                <li class="list-group-item">É obrigatório devolver o veículo com o tanque cheio.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Valores e Pagamento</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">O valor do aluguel é cobrado por km rodado.</li>
                                <li class="list-group-item">O valor do km é padronizado, mas pode ser alterado.</li>
                                <li class="list-group-item">O pagamento é realizado somente na devolução.</li>
                                <li class="list-group-item">O cálculo do pagamento é feito com base nos km rodados.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Recursos do Sistema</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Cadastro de clientes, veículos e funcionários.</li>
                                <li class="list-group-item">Registro do aluguel e do funcionário que o realizou.</li>
                                <li class="list-group-item">Consulta de veículos disponíveis e alugados.</li>
                                <li class="list-group-item">Visualização da duração dos aluguéis ativos.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center">
            <a href="atividades.php" class="btn btn-primary mt-3">Voltar a Página de Atividades</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Instituto Federal Goiano. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>