<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="icon/icone.ico" type="image/x-icon">
  <title>Ações do Sistema</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
            <a class="nav-link active" aria-current="page" href="atividades.php">Ações</a>
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
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <h2 class="text-center mb-3">Todas as Ações do Sistema</h2>
    <ul class="list-group">
      <li class="list-group-item">
        <a href="cadastro_pessoa.php" class="text-decoration-none">Cadastro de Pessoas</a>
      </li>
      <li class="list-group-item">
        <a href="cadastro_empresa.php" class="text-decoration-none">Cadastro de Empresas</a>
      </li>
      <li class="list-group-item">
        <a href="cadastro_funcionario.php" class="text-decoration-none">Cadastro de Funcionário</a>
      </li>
      <li class="list-group-item">
        <a href="cadastro_veiculo.php" class="text-decoration-none">Cadastro de Veículo</a>
      </li>
      <li class="list-group-item">
        <a href="formEmprestimo.php" class="text-decoration-none">Fazer um Aluguel</a>
      </li>
      <li class="list-group-item">
        <a href="pagamento_clienteSelect.php" class="text-decoration-none">Fazer um Pagamento</a>
      </li>
      <li class="list-group-item">
        <a href="listagens.php" class="text-decoration-none">Acessar os Registros</a>
      </li>
    </ul>
    <div class="text-center">
      <a href="duvidas.php" class="btn btn-primary mt-3">Como Usar</a>
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

  <script src="https://kit.fontawesome.com/e3594800e9.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>