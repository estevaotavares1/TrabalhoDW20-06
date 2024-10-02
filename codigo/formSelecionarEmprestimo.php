<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Empréstimos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Selecionar Empréstimo</h3>

        <form action="formPagamento.php" method="GET">
            <?php
            require_once "conexao.php";
            require_once "operacoes.php";
            $id_cliente = $_GET['id_cliente'];

            $emprestimos = listarEmprestimoCliente($conexao, $id_cliente);
            $quantidade = sizeof($emprestimos);

            if ($quantidade > 0) {
                echo "<div class='mb-3'>";
                echo "<label for='id_aluguel' class='form-label'>Empréstimos:</label>";
                echo "<select name='id_aluguel' id='id_aluguel' class='form-select' required>";

                foreach ($emprestimos as $emprestimo) {
                    $id_aluguel = $emprestimo[0];
                    $datainicial_aluguel = $emprestimo[1];
                    $datafinal_aluguel = $emprestimo[2];

                    echo "<option value='$id_aluguel'>$datainicial_aluguel > $datafinal_aluguel</option>";
                }
                echo "</select>";
                echo "</div>";
                echo "<input type='hidden' name='id_cliente' value='$id_cliente'>";
                echo "<div class='text-center'>";
                echo "<input type='submit' value='Preencher dados do pagamento' class='btn btn-primary'>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning' role='alert'>Não há empréstimos para esse cliente.</div>";
            }
            ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>