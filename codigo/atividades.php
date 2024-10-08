<?php
require_once 'testalogin.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema de Cadastro</title>
    <!-- Bootstrap 5.3 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="estilos/style.css" />
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center mb-4">Sistema de Cadastro</h2>
      <ul class="list-group">
        <li class="list-group-item">
          <a href="cadastro_pessoa.html" class="text-decoration-none"
            >Cadastro de Pessoas</a
          >
        </li>
        <li class="list-group-item">
          <a href="cadastro_empresa.html" class="text-decoration-none"
            >Cadastro de Empresas</a
          >
        </li>
        <li class="list-group-item">
          <a href="cadastro_funcionario.html" class="text-decoration-none"
            >Cadastro de Funcionário</a
          >
        </li>
        <li class="list-group-item">
          <a href="cadastro_veiculo.html" class="text-decoration-none"
            >Cadastro de Veículo</a
          >
        </li>
        <li class="list-group-item">
          <a href="formEmprestimo.php" class="text-decoration-none"
            >Fazer um Aluguel</a
          >
        </li>
        <li class="list-group-item">
          <a href="formClientePagamento.php" class="text-decoration-none"
            >Fazer um Pagamento</a
          >
        </li>
        <li class="list-group-item">
          <a href="listagens.html" class="text-decoration-none"
            >Acessar os Registros</a
          >
        </li>
      </ul>
    </div>

    <!-- Bootstrap 5.3 JS and dependencies -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
