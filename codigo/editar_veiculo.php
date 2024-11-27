<?php
require_once 'testalogin.php';
require_once "conexao.php";

if (isset($_GET['id_veiculo'])) {
    $id_veiculo = $_GET['id_veiculo'];

    $sql_verificar_status = "SELECT status FROM tb_veiculo WHERE id_veiculo = $id_veiculo";
    $resultado_status = mysqli_query($conexao, $sql_verificar_status);

    if (mysqli_num_rows($resultado_status) > 0) {
        $linha = mysqli_fetch_array($resultado_status);
        $status_veiculo = $linha['status'];

        if ($status_veiculo == 'Indisponível') {
            header('Location: erro2.php');
            exit;
        } else {
            $sql = "SELECT * FROM tb_veiculo WHERE id_veiculo = $id_veiculo";
            $resultado = mysqli_query($conexao, $sql);
            $linha = mysqli_fetch_array($resultado);
            $nome = $linha['nome'];
            $marca = $linha['marca'];
            $ano = $linha['ano'];
            $placa_veiculo = $linha['placa_veiculo'];
            $capacidade_veiculo = $linha['capacidade_veiculo'];
            $vidroeletrico_veiculo = $linha['vidroeletrico_veiculo'];
            $airbag_veiculo = $linha['airbag_veiculo'];
            $capacidaportamala_veiculo = $linha['capacidaportamala_veiculo'];
            $arcondicionado_veiculo = $linha['arcondicionado_veiculo'];
            $automatico_veiculo = $linha['automatico_veiculo'];
            $km_veiculo = $linha['km_veiculo'];
        }
    } else {
        echo "Veículo não encontrado";
    }
} else {
    $id_veiculo = 0;
    echo "Nenhum veículo encontrado";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="icon/icone.ico" type="image/x-icon">
    <title>Editar Veículo</title>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header class="container-fluid d-flex justify-content-between align-items-center">
        <div class="logo d-flex align-items-center">
            <img src="img/logo.png" alt="Logo" class="logo-img me-2">
            <h2>Vrum Vrum Aluguéis</h2>
        </div>
        <div class="user-info text-end">
            <a href="sobre_funcionario.php" class="text-decoration-none">Funcionário:
                <?php echo $nomeFuncionario; ?></a>
            <p>Data: <?php echo $dataAtual; ?></p>
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
                            class="nav-link"
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
                            class="nav-link active dropdown-toggle"
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
        <h2 class="text-center mb-4">Editar um Veículo</h2>
        <form id="atualizarVeiculo" action="atualizar_veiculo.php?id_veiculo=<?php echo $id_veiculo ?>" method="POST">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Veículo:</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    maxlength="45"
                    class="form-control"
                    value="<?php echo $nome; ?>"
                    placeholder="Digite o nome do veículo"
                    required />
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca do Veículo:</label>
                <input
                    type="text"
                    id="marca"
                    name="marca"
                    maxlength="45"
                    class="form-control"
                    value="<?php echo $marca; ?>"
                    placeholder="Digite a marca do veículo"
                    required />
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano do Veículo:</label>
                <input
                    type="number"
                    id="ano"
                    name="ano"
                    class="form-control"
                    value="<?php echo $ano; ?>"
                    placeholder="AAAA"
                    required />
            </div>

            <div class="mb-3">
                <label for="placa_veiculo" class="form-label">Placa:</label>
                <input
                    type="text"
                    id="placa_veiculo"
                    name="placa_veiculo"
                    maxlength="8"
                    class="form-control"
                    value="<?php echo $placa_veiculo; ?>"
                    placeholder="AAA-9999"
                    required />
            </div>

            <div class="mb-3">
                <label for="capacidade_veiculo" class="form-label">Capacidade de Passageiros:</label>
                <input
                    type="text"
                    id="capacidade_veiculo"
                    name="capacidade_veiculo"
                    class="form-control"
                    value="<?php echo $capacidade_veiculo; ?>"
                    placeholder="Digite a capacidade do veículo"
                    required />
            </div>

            <div class="mb-3">
                <label for="vidroeletrico_veiculo" class="form-label">Vidro Elétrico:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="vidroeletrico_veiculo"
                            id="vidroeletrico_sim"
                            value="s"
                            <?php if (isset($vidroeletrico_veiculo) && $vidroeletrico_veiculo == 1) echo 'checked'; ?>
                            required />
                        <label class="form-check-label" for="vidroeletrico_sim">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="vidroeletrico_veiculo"
                            id="vidroeletrico_nao"
                            value="n"
                            <?php if (isset($vidroeletrico_veiculo) && $vidroeletrico_veiculo == 0) echo 'checked'; ?> />
                        <label class="form-check-label" for="vidroeletrico_nao">Não</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="airbag_veiculo" class="form-label">Airbag:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="airbag_veiculo"
                            id="airbag_sim"
                            value="s"
                            <?php if (isset($airbag_veiculo) && $airbag_veiculo == 1) echo 'checked'; ?>
                            required />
                        <label class="form-check-label" for="airbag_sim">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="airbag_veiculo"
                            id="airbag_nao"
                            value="n" 
                            <?php if (isset($airbag_veiculo) && $airbag_veiculo == 0) echo 'checked'; ?> />
                        <label class="form-check-label" for="airbag_nao">Não</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="capacidaportamala_veiculo" class="form-label">Capacidade do Porta-malas em Litros:</label>
                <input
                    type="text"
                    id="capacidaportamala_veiculo"
                    name="capacidaportamala_veiculo"
                    class="form-control"
                    value="<?php echo $capacidaportamala_veiculo; ?>"
                    placeholder="Digite a capacidade do porta-malas"
                    required />
            </div>

            <div class="mb-3">
                <label for="arcondicionado_veiculo" class="form-label">Ar Condicionado:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="arcondicionado_veiculo"
                            id="arcondicionado_sim"
                            value="s"
                            <?php if (isset($arcondicionado_veiculo) && $arcondicionado_veiculo == 1) echo 'checked'; ?>
                            required />
                        <label class="form-check-label" for="arcondicionado_sim">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="arcondicionado_veiculo"
                            id="arcondicionado_nao"
                            value="n" 
                            <?php if (isset($arcondicionado_veiculo) && $arcondicionado_veiculo == 0) echo 'checked'; ?> />
                        <label class="form-check-label" for="arcondicionado_nao">Não</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="automatico_veiculo" class="form-label">Automático:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="automatico_veiculo"
                            id="automatico_sim"
                            value="s"
                            <?php if (isset($automatico_veiculo) && $automatico_veiculo == 1) echo 'checked'; ?>
                            required />
                        <label class="form-check-label" for="automatico_sim">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="automatico_veiculo"
                            id="automatico_nao"
                            value="n" 
                            <?php if (isset($automatico_veiculo) && $automatico_veiculo == 0) echo 'checked'; ?> />
                        <label class="form-check-label" for="automatico_nao">Não</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="km_veiculo" class="form-label">Km Inicial:</label>
                <input
                    type="text"
                    id="km_veiculo"
                    name="km_veiculo"
                    class="form-control"
                    value="<?php echo $km_veiculo; ?>"
                    placeholder="Digite quantos Km rodados o véiculo tem"
                    required />
            </div>

            <div class="text-center">
                <input type="submit" value="Atualizar" class="btn btn-primary" />
            </div>
        </form>
        <div class="text-center">
            <a href="listar_veiculos.php" class="btn btn-primary mt-3">Voltar</a>
            <a href="atividades.php" class="btn btn-primary mt-3">Voltar a Página de Atividades</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Instituto Federal Goiano. Todos os direitos reservados.<br>
            <a href="#">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="#">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="#">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </p>
    </footer>

    <script>
        $(document).ready(function() {
            $("#atualizarVeiculo").validate({
                rules: {
                    nome: {
                        required: true,
                    },
                    marca: {
                        required: true,
                    },
                    ano: {
                        required: true,
                        number: true,
                        min: 1900,
                        max: new Date().getFullYear(),
                    },
                    placa_veiculo: {
                        required: true,
                        minlength: 8,
                        maxlength: 8,
                    },
                    capacidade_veiculo: {
                        required: true,
                        number: true,
                        min: 0,
                        max: 9,
                    },
                    vidroeletrico_veiculo: {
                        required: true,
                    },
                    airbag_veiculo: {
                        required: true,
                    },
                    capacidaportamala_veiculo: {
                        required: true,
                        number: true,
                        min: 0,
                        max: 1700,
                    },
                    arcondicionado_veiculo: {
                        required: true,
                    },
                    automatico_veiculo: {
                        required: true,
                    },
                    km_veiculo: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                },
                messages: {
                    nome: {
                        required: "O nome do veículo é obrigatório.",
                    },
                    marca: {
                        required: "A marca do veículo é obrigatória.",
                    },
                    ano: {
                        required: "O ano do veículo é obrigatório.",
                        number: "O ano deve ser um número válido.",
                        min: "O ano não pode ser inferior a 1900.",
                        max: "O ano não pode ser superior ao ano atual.",
                    },
                    placa_veiculo: {
                        required: "A placa do veículo é obrigatória.",
                        minlength: "Informe uma placa válida no formato AAA-9999.",
                        maxlength: "Informe uma placa válida no formato AAA-9999.",
                    },
                    capacidade_veiculo: {
                        required: "A capacidade do veículo é obrigatória.",
                        number: "Digite uma quantidade válida de passageiros.",
                        min: "O número de passageiros não pode ser um valor negativo.",
                        max: "Esse carro não existe meu nobre kkkkk.",
                    },
                    vidroeletrico_veiculo: {
                        required: "É necessário informar se o veículo tem vidro elétrico.",
                    },
                    airbag_veiculo: {
                        required: "É necessário informar se o veículo tem airbag.",
                    },
                    capacidaportamala_veiculo: {
                        required: "A capacidade do porta-malas é obrigatória.",
                        number: "Digite a capacidade em litros do porta-malas.",
                        min: "A capacidade do porta-malas não pode ser negativa.",
                        max: "Aí já não é um carro, é um navio cargueiro.",
                    },
                    arcondicionado_veiculo: {
                        required: "É necessário informar se o veículo tem ar condicionado.",
                    },
                    automatico_veiculo: {
                        required: "É necessário informar se o veículo é automático.",
                    },
                    km_veiculo: {
                        required: "O km inicial do veículo é obrigatório.",
                        number: "O km deve ser um número válido.",
                        min: "O km não pode ser um valor negativo",
                    },
                },
            });
            $("#placa_veiculo").mask("AAA-9999");
        });
    </script>

    <script src="https://kit.fontawesome.com/e3594800e9.js" crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>