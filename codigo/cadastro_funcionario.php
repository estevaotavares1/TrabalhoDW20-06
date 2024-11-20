<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastrar Funcionário</title>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
  <header
    class="container-fluid d-flex justify-content-between align-items-center">
    <div class="logo">
      <h2>Sistema de Aluguéis de Veículos</h2>
    </div>
    <div class="user-info text-end">
      <a href="http://lattes.cnpq.br/3766134688368012" class="text-decoration-none">Proprietário: Lucas Faria</a>
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
  <div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro de Funcionário</h2>
    <form id="formFuncionario" action="cad_funcionario.php" method="POST">
      <div class="mb-3">
        <label for="nome_funcionario" class="form-label">Nome:</label>
        <input
          type="text"
          id="nome_funcionario"
          name="nome_funcionario"
          class="form-control"
          placeholder="Digite o nome completo"
          required />
      </div>

      <div class="mb-3">
        <label for="cpf_funcionario" class="form-label">CPF:</label>
        <input
          type="text"
          id="cpf_funcionario"
          name="cpf_funcionario"
          maxlength="14"
          class="form-control"
          placeholder="000.000.000-00"
          required />
      </div>

      <div class="mb-3">
        <label for="email_funcionario" class="form-label">Email:</label>
        <input
          type="email"
          id="email_funcionario"
          name="email_funcionario"
          class="form-control"
          placeholder="papaula@gmail.com"
          required />
      </div>

      <div class="mb-3">
        <label for="telefone_funcionario" class="form-label">Telefone:</label>
        <input
          type="text"
          id="telefone_funcionario"
          name="telefone_funcionario"
          class="form-control"
          maxlength="14"
          placeholder="(00)00000-0000"
          required />
      </div>

      <div class="mb-3">
        <label for="senha_funcionario" class="form-label">Senha:</label>
        <input
          type="text"
          id="senha_funcionario"
          name="senha_funcionario"
          class="form-control"
          placeholder="Digite sua senha"
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
    $(document).ready(function() {
      $("#formFuncionario").validate({
        rules: {
          nome_funcionario: {
            required: true,
            minlength: 2,
          },
          cpf_funcionario: {
            required: true,
            minlength: 14,
            maxlength: 14,
          },
          telefone_funcionario: {
            required: true,
            minlength: 14,
            maxlength: 14,
          },
          email_funcionario: {
            required: true,
            email: true,
          },
          senha_funcionario: {
            required: true,
          },
        },
        messages: {
          nome_funcionario: {
            required: "Campo nome é obrigatório.",
            minlength: "O nome deve ter pelo menos 2 caracteres.",
          },
          cpf_funcionario: {
            required: "O CPF é obrigatório.",
            minlength: "Insira o CPF no formato adequado.",
            maxlength: "Insira o CPF no formato adequado.",
          },
          telefone_funcionario: {
            required: "O campo telefone é obrigatório.",
            minlength: "Insira o telefone no formato adequado.",
            maxlength: "Insira o telefone no formato adequado.",
          },
          email_funcionario: {
            required: "O campo email é obrigatório.",
            email: "Informe um email válido.",
          },
          senha_funcionario: {
            required: "Campo senha é obrigatório.",
          },
        },
      });
      $("#cpf_funcionario").mask("000.000.000-00");
      $("#telefone_funcionario").mask("(00)00000-0000");
    });
  </script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>