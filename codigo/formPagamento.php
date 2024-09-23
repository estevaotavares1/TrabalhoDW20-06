<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançar pagamento</title>
    <script>
        // Função para calcular o valor total com base nos quilômetros finais e preço por km
        function calcularValor() {
            let kmfinais = document.querySelectorAll('input[name="kmfinal[]"]');
            let precoPorKm = parseFloat(document.querySelector('input[name="preco_por_km"]').value);
            let valorTotal = 0;

            kmfinais.forEach(function(kmFinal, index) {
                let kmInicial = parseFloat(document.querySelectorAll('.km-inicial')[index].innerText);
                let kmRodado = parseFloat(kmFinal.value) - kmInicial;
                valorTotal += kmRodado * precoPorKm;
            });

            document.querySelector('input[name="valor_total"]').value = valorTotal.toFixed(2);
        }
    </script>
</head>

<body>
    <h2>Lançar pagamento</h2>
    <form action="cad_pagamento.php" method="POST">
        <input type="hidden" name="id_aluguel" value="<?php echo $_GET['id_aluguel'] ?? ''; ?>">

        Valor: <br>
        <input type="text" name="valor_total" disabled><br>

        Preço por KM: <br>
        <input type="number" step="0.01" name="preco_por_km" required><br>

        Data Atual: <br>
        <input type="date" name="data_pagamento" required><br>

        Método de pagamento: <br>
        <select name="metodo_pagamento" required>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Cartão de Crédito">Cartão de Crédito</option>
            <option value="Cartão de Débito">Cartão de Débito</option>
        </select> <br><br>

        <h4>Carros</h4>
        <hr>
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        $carros = listarVeiculosEmprestimo($conexao, $_GET['id_aluguel'] ?? '');

        foreach ($carros as $carroEmprestimo) {
            $veiculo = listarVeiculoPorId($conexao, $carroEmprestimo[0] ?? '');
            echo "<input type='hidden' name='veiculo_ids[]' value='$veiculo[0]'>";
            echo "<p>Veículo: $veiculo[1] - $veiculo[2]</p>";
            echo "<p class='km-inicial'>Km Inicial: $veiculo[12]</p>";
            echo "Km Final: <input type='number' name='kmfinal[]' required><br><hr>";
        }
        ?>

        <button type="button" onclick="calcularValor()">Calcular valor</button><br><br>
        <input type="submit" value="Lançar pagamento">
    </form>
</body>

</html>
