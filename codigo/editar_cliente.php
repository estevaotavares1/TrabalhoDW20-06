<?php
require_once 'conexao.php'; // Inclui a conexão com o banco de dados

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $sql = "SELECT * FROM tb_cliente WHERE id_cliente = $id_cliente";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="estilo/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Cliente</h2>

        <form id = "atualizarcli" action="atualizar_cliente.php" method="post">
            <!-- Campo oculto com o ID do cliente -->
            <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>">
            
            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id = "nome" name="nome" class="form-control" value="<?= $linha['nome'] ?>" required>
            </div>
            
            <!-- Endereço -->
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id = "endereco" name="endereco" class="form-control" value="<?= $linha['endereco'] ?>" required>
            </div>
            
            <!-- Telefone -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id = "telefone" name="telefone" class="form-control" value="<?= $linha['telefone'] ?>" required>
            </div>

            <!-- Botão de atualização -->
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="lista_clientes.php" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
    <script>
    $(document).ready(function() {
      $("#atualizarcli").validate({
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
          cpf: {
            required: true,
            minlength: 14,
            maxlength: 14,
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
          cpf: {
            required: "O CPF é obrigatório.",
            minlength: "Insira o CPF no formato adequado.",
            maxlength: "Insira o CPF no formato adequado.",
          },
        },
      });
      $("#cpf").mask("000.000.000-00");
      $("#telefone").mask("(00)00000-0000");
    });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "ID do cliente não especificado.";
}

mysqli_close($conexao); // Fecha a conexão com o banco de dados
?>
