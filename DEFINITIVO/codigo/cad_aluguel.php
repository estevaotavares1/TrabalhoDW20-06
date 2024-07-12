<?php

require_once 'conexao.php';

// Obtém os dados do formulário
$cliente = $_POST['cliente'];
$veiculo = $_POST['veiculo'];
$funcionario = $_POST['funcionario'];
$datainicial = $_POST['datainicial'];
$datafinal = $_POST['datafinal'];
$kminicial = $_POST['kminicial'];
$preco_por_km = 2.0; // Definindo a taxa fixa por quilômetro
$kmfinal = $_POST['kmfinal'];
$pagamento = $_POST['pagamento'];

// Verifica se o veículo está disponível nas datas fornecidas
$sql_verifica_disponibilidade = "
    SELECT * FROM tb_aluguel
    INNER JOIN tb_aluguel_has_tb_veiculo ON tb_aluguel.id_aluguel = tb_aluguel_has_tb_veiculo.tb_aluguel_id_aluguel
    WHERE tb_aluguel_has_tb_veiculo.tb_veiculo_id_veiculo = '$veiculo'
    AND ('$datainicial' BETWEEN tb_aluguel.datainicial_aluguel AND tb_aluguel.datafinal_aluguel
    OR '$datafinal' BETWEEN tb_aluguel.datainicial_aluguel AND tb_aluguel.datafinal_aluguel
    OR tb_aluguel.datainicial_aluguel BETWEEN '$datainicial' AND '$datafinal'
    OR tb_aluguel.datafinal_aluguel BETWEEN '$datainicial' AND '$datafinal')
";

$result_disponibilidade = mysqli_query($conexao, $sql_verifica_disponibilidade);

if (mysqli_num_rows($result_disponibilidade) > 0) {
    echo "O veículo não está disponível nas datas selecionadas.";
    mysqli_close($conexao);
    exit();
}

// Calcula o preço do aluguel
$preco_aluguel = ($kmfinal - $kminicial) * $preco_por_km;

// Insere os dados na tabela tb_aluguel
$sql_aluguel = "INSERT INTO tb_aluguel (datainicial_aluguel, kminicial_aluguel, datafinal_aluguel, preço_aluguel, tb_cliente_id_cliente, tb_funcionario_id_funcionario)
                VALUES ('$datainicial', '$kminicial', '$datafinal', '$preco_aluguel', '$cliente', '$funcionario')";

if (mysqli_query($conexao, $sql_aluguel)) {
    // Obtém o ID do aluguel recém-criado
    $id_aluguel = mysqli_insert_id($conexao);

    // Associa o veículo ao aluguel na tabela de relacionamento
    $sql_aluguel_veiculo = "INSERT INTO tb_aluguel_has_tb_veiculo (tb_aluguel_id_aluguel, tb_veiculo_id_veiculo) VALUES ('$id_aluguel', '$veiculo')";

    if (mysqli_query($conexao, $sql_aluguel_veiculo)) {
        header('Location: index.html');
        exit();
    } else {
        echo "Ocorreu um erro ao associar o veículo ao aluguel. Tente novamente.";
    }
} else {
    echo "Ocorreu um erro ao registrar o aluguel. Tente novamente.";
}

mysqli_close($conexao);
?>
