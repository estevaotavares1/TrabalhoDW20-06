<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Lançar pagamento</h2>
    <form action="cad_pagamento.php" method="POST">
        <input type="hidden" name="id_aluguel" value="<?php echo $_GET['id_aluguel']; ?>">
        Valor: <br>
        <input type="number" name="valor" step="0.01" min="0" required><br>
        Preço por KM: <br>
        <input type="number" name="preco_por_km" step="0.01" min="0" required><br>
        Data Atual: <br>
        <input type="date" name="data_pagamento" required><br>
        Método pagamento: <br>

        <select name = "metodo" required >
            <option>Dinheiro</option>
            <option>Cartão</option>
        </select> <br>

        <h4>Carros</h4>
        <hr>
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        $carros = listarVeiculosEmprestimo($conexao, $_GET['id_aluguel']);

        foreach ($carros as $carroEmprestimo) {
            $veiculo = listarVeiculoPorId($conexao, $carroEmprestimo[0]);

            // Certifique-se de que $veiculo tenha o número correto de elementos
            if (count($veiculo) === 13) { // 13 campos no exemplo acima
                echo "<input type='hidden' name='id_veiculo[]' value='{$veiculo[0]}'>"; // Correção para adicionar o ID do veículo
                echo "<p>Veículo: {$veiculo[1]} - {$veiculo[2]}</p>";
                echo "<p>Km Inicial: {$veiculo[12]}</p>";
                echo "Km Final: <input type='number' name='kmfinal[]' step='0.01' min='{$veiculo[12]}' required>"; // Campo para Km Final
                echo "<hr>";
            } else {
                echo "<p>Erro ao carregar informações do veículo.</p>";
            }
        }
        ?>

        <input type="submit" value='Lançar pagamento'>
    </form>
</body>

</html>
