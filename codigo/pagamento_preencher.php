<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançar Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Lançar Pagamento</h2>
        <form action="pagamento_terminar.php" method="POST">
            <input type="hidden" name="id_aluguel" value="<?php echo $_GET['id_aluguel']; ?>">

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="number" name="valor" step="0.01" min="0" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="preco_por_km" class="form-label">Preço por KM:</label>
                <input type="number" name="preco_por_km" step="0.01" min="0" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="data_pagamento" class="form-label">Data Atual:</label>
                <input type="date" name="data_pagamento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="metodo" class="form-label">Método de Pagamento:</label>
                <select name="metodo" class="form-select" required>
                    <option value="Dinheiro">Dinheiro</option>
                    <option value="Cartão">Cartão</option>
                </select>
            </div>

            <h4>Veículos</h4>
            <hr>
            <?php
            require_once "conexao.php";
            require_once "operacoes.php";

            $carros = listarVeiculosEmprestimo($conexao, $_GET['id_aluguel']);

            foreach ($carros as $carroEmprestimo) {
                $veiculo = listarVeiculoPorId($conexao, $carroEmprestimo[0]);

                // Validação, certifica-se de que $veiculo tenha o número correto de elementos (campos para preencher)
                if (count($veiculo) === 12) {
                    echo "<input type='hidden' name='id_veiculo[]' value='{$veiculo[0]}'>";
                    echo "<div class='mb-3'>";
                    echo "<p><strong>Veículo:</strong> {$veiculo[1]} - {$veiculo[2]}</p>";
                    echo "<p><strong>Km Inicial:</strong> {$veiculo[11]}</p>";
                    echo "<label for='kmfinal' class='form-label'>Km Final:</label>";
                    echo "<input type='number' name='kmfinal[]' class='form-control' step='0.01' min='{$veiculo[11]}' required>";
                    echo "</div>";
                    echo "<hr>";
                } else {
                    echo "<p>Erro ao carregar informações do veículo.</p>";
                }
            }
            ?>

            <div class="text-center">
                <input type="submit" value="Lançar Pagamento" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
