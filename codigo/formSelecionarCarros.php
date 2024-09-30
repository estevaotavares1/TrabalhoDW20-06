<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Carros</title>
</head>

<body>
    <h3>Carros Disponíveis</h3>

    <form action="gravarEmprestimo.php" method="GET">
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        $datainicial_aluguel = $_GET['datainicial_aluguel'];
        $datafinal_aluguel = $_GET['datafinal_aluguel'];

        // Chama a função que lista apenas os veículos disponíveis
        $carros = listarVeiculosDisponiveis($conexao);

        foreach ($carros as $carro) {
            echo "<input type='checkbox' name='carros[]' value='{$carro['id_veiculo']}'><br>
            Nome: {$carro['nome']}<br>
            Marca: {$carro['marca']}<br>
            Ano: {$carro['ano']}<br>
            Tipo: {$carro['tipo_veiculo']}<br>
            Placa: {$carro['placa']}<br>
            Capacidade: {$carro['capacidade']}<br>
            Vidro Elétrico: {$carro['vidro_eletrico']}<br>
            Airbag: {$carro['airbag']}<br>
            Porta-malas: {$carro['capacidade_porta_mala']}<br>
            Ar-Condicionado: {$carro['ar_condicionado']}<br>
            Automático: {$carro['automatico']}<br>
            (KM: {$carro['km_inicial']})<br><br>";
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
