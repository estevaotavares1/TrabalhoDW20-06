<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Carros Disponíveis</h3>

    <form action="gravarEmprestimo.php">
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        $datainicial_aluguel = $_GET['datainicial_aluguel'];
        $datafinal_aluguel = $_GET['datafinal_aluguel'];

        // Chama a função que lista apenas os veículos disponíveis
        $carros = listarVeiculosDisponiveis($conexao);

        foreach ($carros as $carro) {
            // $id = $carro[0];
            echo "<input type='checkbox' name='carros[]' value='$carro[id_veiculo]'><br> Nome: $carro[nome] <br> Marca: $carro[marca]<br> Ano: $carro[ano]<br> Tipo: $carro[tipo_veiculo]<br> Placa: $carro[placa_veiculo]<br> Capacidade: $carro[capacidade_veiculo]<br> Vidro Eletrico: $carro[vidroeletrico_veiculo]<br> Airbag: $carro[airbag_veiculo]<br> Porta malas: $carro[capacidaportamala_veiculo]<br> Ar-Condicionado: $carro[arcondicionado_veiculo]<br> Automatico: $carro[automatico_veiculo]<br> (KM: $carro[km_veiculo]) <br><br>";
        }
        ?>
        <input type="hidden" name="datainicial_aluguel" value="<?php echo $_GET['datainicial_aluguel']; ?>">
        <input type="hidden" name="datafinal_aluguel" value="<?php echo $_GET['datafinal_aluguel']; ?>">
        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id_cliente']; ?>">
        <input type="hidden" name="id_funcionario" value="<?php echo $_GET['id_funcionario']; ?>">
        <input type="submit" value="Gravar">
    </form>

</body>

</html>