<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos</title>
    <script src="js/jquery-3.7.1.min.js"></script>
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
            <a href="http://lattes.cnpq.br/3766134688368012" target="_blank" class="text-decoration-none">Proprietário: Lucas Faria</a>
            <p>Data: 28/11/2024 - 13:55</p>
        </div>
    </header>

    <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary">
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
                            href="atividades.php">Todas as Ações</a>
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
                        <a id="deslogar" class="nav-link" href="deslogar.php">Fazer Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Veículos</h2>
        <form class="mb-3">
            <div class="input-group">
                <input id="filtro-tabela" type="text" class="form-control" placeholder="Pesquisar Veículos">
                <button type="button" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Placa</th>
                        <th>Capacidade</th>
                        <th>Vidro Elétrico</th>
                        <th>Airbag</th>
                        <th>Porta-malas</th>
                        <th>Ar-condicionado</th>
                        <th>Automático</th>
                        <th>KM</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "conexao.php";
                    require_once "operacoes.php";

                    // Lista os veículos disponíveis e indisponíveis
                    $veiculosDisponiveis = imprimirVeiculosDisponiveis($conexao);
                    $veiculosIndisponiveis = imprimirVeiculosIndisponiveis($conexao);

                    // Função para exibir em formato de tabela
                    function exibirTabelaVeiculos($veiculos, $status)
                    {
                        foreach ($veiculos as $veiculo) {
                            $vidroEletrico = $veiculo['vidroeletrico_veiculo'] ? 'Sim' : 'Não';
                            $airbag = $veiculo['airbag_veiculo'] ? 'Sim' : 'Não';
                            $arCondicionado = $veiculo['arcondicionado_veiculo'] ? 'Sim' : 'Não';
                            $automatico = $veiculo['automatico_veiculo'] ? 'Sim' : 'Não';

                            echo "<tr>";
                            echo "<td>{$veiculo['id_veiculo']}</td>";
                            echo "<td>{$veiculo['nome']}</td>";
                            echo "<td>{$veiculo['marca']}</td>";
                            echo "<td>{$veiculo['ano']}</td>";
                            echo "<td>{$veiculo['placa_veiculo']}</td>";
                            echo "<td>{$veiculo['capacidade_veiculo']}</td>";
                            echo "<td>$vidroEletrico</td>";
                            echo "<td>$airbag</td>";
                            echo "<td>{$veiculo['capacidaportamala_veiculo']}</td>";
                            echo "<td>$arCondicionado</td>";
                            echo "<td>$automatico</td>";
                            echo "<td>{$veiculo['km_veiculo']}</td>";
                            echo "<td>
                                    <a href='#' class='btn btn-warning btn-sm'>Editar</a>
                                    <a id='excluir' href='#' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                                  </td>";
                            echo "</tr>";
                        }
                    }

                    // Exibir veículos disponíveis
                    if (!empty($veiculosDisponiveis)) {
                        echo "<tr class='table-success'><td colspan='14'><h5>Veículos Disponíveis</h5></td></tr>";
                        exibirTabelaVeiculos($veiculosDisponiveis, 'Disponível');
                    } else {
                        echo "<tr><td colspan='14'>Nenhum veículo disponível encontrado.</td></tr>";
                    }

                    // Exibir veículos indisponíveis
                    if (!empty($veiculosIndisponiveis)) {
                        echo "<tr class='table-danger'><td colspan='14'><h5>Veículos Indisponíveis</h5></td></tr>";
                        exibirTabelaVeiculos($veiculosIndisponiveis, 'Indisponível');
                    } else {
                        echo "<tr><td colspan='14'>Nenhum veículo indisponível encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="listagens.php" class="btn btn-primary mt-3">Voltar</a>
            <a href="atividades.php" class="btn btn-primary mt-3">Voltar a Página de Atividades</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Instituto Federal Goiano. Todos os direitos reservados.</p>
    </footer>

    <script>
        function filtrarTabela() {
            var filtro = $('#filtro-tabela').val().toLowerCase();

            $('table tbody tr').each(function() {
                var textoLinha = $(this).text().toLowerCase();
                if (textoLinha.includes(filtro)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('#filtro-tabela').on('input', filtrarTabela);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>