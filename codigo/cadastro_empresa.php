<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="icon/icone.ico" type="image/x-icon">
  <title>Cadastrar Empresa</title>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="atividades.php">Ações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="formEmprestimo.php">Alugar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pagamento_clienteSelect.php">Pagar</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <h2 class="text-center mb-4">Cadastro de Empresa</h2>
    <form id="formEmpresa" action="cad_submit.php" method="POST">

      <input type='hidden' name='tipo' value='e' />

      <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="100" class="form-control"
          placeholder="Digite o nome da empresa" required />
      </div>

      <div class="mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" maxlength="45" class="form-control"
          placeholder="Digite o endereço completo" required />
      </div>

      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" maxlength="14" class="form-control"
          placeholder="(00)00000-0000" required />
      </div>

      <div class="mb-3">
        <label for="cnpj" class="form-label">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" maxlength="18" class="form-control" placeholder="00.000.000/0001-00"
          required />
      </div>

      <div class="text-center">
        <input type="submit" value="Cadastrar" class="btn btn-primary" />
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
    $(document).ready(function () {
      $("#formEmpresa").validate({
        rules: {
          nome: {
            required: true,
            minlength: 2,
          },
          endereco: {
            required: true,
            minlength: 4,
          },
          telefone: {
            required: true,
            minlength: 14,
            maxlength: 14,
          },
          cnpj: {
            required: true,
            minlength: 18,
            maxlength: 18,
          },
        },
        messages: {
          nome: {
            required: "Campo nome é obrigatório.",
            minlength: "O nome deve ter pelo menos 2 caracteres.",
          },
          endereco: {
            required: "Campo endereço é obrigatório.",
            minlength: "O endereço deve ter pelo menos 4 caracteres.",
          },
          telefone: {
            required: "O campo telefone é obrigatório.",
            minlength: "Insira o telefone no formato adequado.",
            maxlength: "Insira o telefone no formato adequado.",
          },
          cnpj: {
            required: "CNPJ é necessário.",
            minlength: "Insira o CNPJ no formato adequado.",
            maxlength: "Insira o CNPJ no formato adequado.",
          },
        },
      });
      $("#cnpj").mask("00.000.000/0001-00");
      $("#telefone").mask("(00)00000-0000");
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>