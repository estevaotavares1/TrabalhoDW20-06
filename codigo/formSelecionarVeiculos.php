<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
    <div class="container mt-5">
        <h3 class="text-center mb-4">Veículos Disponíveis</h3>

        <form action="gravarEmprestimo.php" method="GET">
            <div class="row">
                <?php
                require_once "conexao.php";
                require_once "operacoes.php";

                $datainicial_aluguel = $_GET['datainicial_aluguel'];
                $datafinal_aluguel = $_GET['datafinal_aluguel'];

                $veiculos = listarVeiculosDisponiveis($conexao);

                // Exibe os Carros
                echo "<div class='col-12 mb-4'><h4>Veículos Disponíveis</h4></div>";
                foreach ($veiculos as $veiculo) {
                    echo "
                        <div class='col-md-6 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$veiculo['nome']}</h5>
                                    <p class='card-text'>
                                        Marca: {$veiculo['marca']}<br>
                                        Ano: {$veiculo['ano']}<br>
                                        Placa: {$veiculo['placa_veiculo']}<br>
                                        Capacidade: {$veiculo['capacidade_veiculo']}<br>
                                        Vidro Elétrico: {$veiculo['vidroeletrico_veiculo']}<br>
                                        Airbag: {$veiculo['airbag_veiculo']}<br>
                                        Porta-malas: {$veiculo['capacidaportamala_veiculo']}<br>
                                        Ar-condicionado: {$veiculo['arcondicionado_veiculo']}<br>
                                        Automático: {$veiculo['automatico_veiculo']}<br>
                                        KM: {$veiculo['km_veiculo']}
                                    </p>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='checkbox' name='veiculos[]' value='{$veiculo['id_veiculo']}' id='veiculo{$veiculo['id_veiculo']}'>
                                        <label class='form-check-label' for='veiculo{$veiculo['id_veiculo']}'>
                                            Selecionar este carro
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                }
                ?>
            </div>

            <input type="hidden" name="datainicial_aluguel" value="<?php echo $_GET['datainicial_aluguel']; ?>">
            <input type="hidden" name="datafinal_aluguel" value="<?php echo $_GET['datafinal_aluguel']; ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $_GET['id_cliente']; ?>">
            <input type="hidden" name="id_funcionario" value="<?php echo $_GET['id_funcionario']; ?>">

            <div class="text-center">
                <input type="submit" value="Gravar" class="btn btn-primary mt-3">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>