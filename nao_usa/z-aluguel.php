<?php

require_once 'conexao.php';

// Obtém todos os clientes
$sql_clientes = "SELECT id_cliente, nome FROM tb_cliente";
$result_clientes = mysqli_query($conexao, $sql_clientes);

// Obtém todos os veículos disponíveis (não alugados)
$sql_veiculos = "
    SELECT id_veiculo, placa_veiculo 
    FROM tb_veiculo 
    WHERE id_veiculo NOT IN (SELECT tb_veiculo_id_veiculo FROM tb_aluguel_has_tb_veiculo)";
$result_veiculos = mysqli_query($conexao, $sql_veiculos);

// Obtém todos os funcionários
$sql_funcionarios = "SELECT id_funcionario, nome_funcionario FROM tb_funcionario";
$result_funcionarios = mysqli_query($conexao, $sql_funcionarios);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alugar Veículo</title>
</head>
<body>
    <h2>Alugar Veículo</h2>
    <form action="cad_aluguel.php" method="POST">
        <label for="cliente">Cliente:</label>
        <select id="cliente" name="cliente" required>
            <?php while ($cliente = mysqli_fetch_assoc($result_clientes)) { ?>
                <option value="<?php echo $cliente['id_cliente']; ?>"><?php echo $cliente['nome']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="veiculo">Veículo:</label>
        <select id="veiculo" name="veiculo" required>
            <?php while ($veiculo = mysqli_fetch_assoc($result_veiculos)) { ?>
                <option value="<?php echo $veiculo['id_veiculo']; ?>"><?php echo $veiculo['placa_veiculo']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="funcionario">Funcionário:</label>
        <select id="funcionario" name="funcionario" required>
            <?php while ($funcionario = mysqli_fetch_assoc($result_funcionarios)) { ?>
                <option value="<?php echo $funcionario['id_funcionario']; ?>"><?php echo $funcionario['nome_funcionario']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="datainicial">Data Inicial:</label>
        <input type="date" id="datainicial" name="datainicial_aluguel" required><br><br>

        <label for="datafinal">Data Final:</label>
        <input type="date" id="datafinal" name="dataprevista_aluguel" required><br><br>

        <label for="kminicial">KM Inicial:</label>
        <input type="number" id="kminicial" name="kminicial_aluguel" required><br><br>

        <label for="preço_do_km_aluguel">Preço por KM:</label>
        <input type="number" id="preço_do_km_aluguel" name="preço_do_km_aluguel" required><br><br>

        <input type="submit" value="Alugar">
    </form>
</body>
</html>

<?php
mysqli_close($conexao);
header('Location: index.html');
?>
