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
        <input type="float" name="valor" required><br>
        Preço por KM: <br>
        <input type="float" name="preco_por_km" required><br>
        Data Atual: <br>
        <input type="date" name="data_pagamento" required><br>
        Método pagamento: <br>

        <select name="metodo" required>
            <option>Dinheiro</option>
            <option>Cartão</option>
        </select> <br>

        <h4>Carros</h4>
        <hr>
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        $carros = listarVeiculosEmprestimo($conexao, $_GET['id_aluguel']);

        // echo "<hr><hr>";
        foreach ($carros as $carroEmprestimo) {
            $veiculo = listarVeiculoPorId($conexao, $carroEmprestimo[0]);
            echo "<input type='hidden' value='$veiculo[0]'>";
            echo "<p>Veículo: $veiculo[1] - $veiculo[2]</p>";
            echo "<p>Km Inicial: $veiculo[12]</p>";
            echo "Km Final: <input type='text' name='kmfinal[]'>";
            echo "<hr>";
        }
        ?>

        <input type="submit" value='Lançar pagamento'>
    </form>
</body>

</html>