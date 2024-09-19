<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Lançar pagamento</h2>
    <form action="">
        <input type="hidden" value="<?php echo $_GET['idemprestimo']; ?>">
        Valor: <br>
        <input type="float" name="valor"><br>
        Preço por KM: <br>
        <input type="float" name="preco_por_km"><br>
        Data Atual: <br>
        <input type="date" name="data_pagamento"><br>
        Método pagamento: <br>
        <input type="text" name="metodo"><br>

        Carros: <br>
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        $carros = listarVeiculosEmprestimo($conexao, $_GET['id_aluguel']);

        foreach ($carros as $carro) {
            
            echo "<hr><hr>";
            echo "<input type='hidden' value='$carro[0]'>";
            echo $carro[1];
        }
        ?>
    </form>
</body>

</html>