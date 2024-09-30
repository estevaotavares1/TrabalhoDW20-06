<?php

$valor = $_POST['valor'];
$preco_por_km = $_POST['preco_por_km'];
$data_pagamento = $_POST['data_pagamento'];
$metodo = $_POST['metodo'];
$id_aluguel = $_POST['id_aluguel'];

require_once 'conexao.php';

// Inserção dos dados na tabela usando consultas preparadas
$sql = "INSERT INTO tb_pagamento (valor, preco_por_km, data_pagamento, metodo, tb_aluguel_id_aluguel) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

// Vinculação dos parâmetros (data: string, km inicial: double, preço do km: double, data prevista: string)
mysqli_stmt_bind_param($stmt, "ddssi", $valor, $preco_por_km, $data_pagamento, $metodo, $id_aluguel);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

// Após inserir o pagamento, adicione:
$sqlUpdateVeiculo = "UPDATE tb_veiculo SET status = 'Disponível' WHERE id_veiculo IN (SELECT veiculo_id FROM tb_veiculo_alugado WHERE aluguel_id = ?)";

// Prepare e execute para atualizar o status dos veículos
$stmtUpdateVeiculo = mysqli_prepare($conexao, $sqlUpdateVeiculo);
mysqli_stmt_bind_param($stmtUpdateVeiculo, "i", $id_aluguel);
mysqli_stmt_execute($stmtUpdateVeiculo);

// Em seguida, delete da tabela de aluguel
$sqlDeleteAluguel = "DELETE FROM tb_aluguel WHERE id_aluguel = ?";
$stmtDeleteAluguel = mysqli_prepare($conexao, $sqlDeleteAluguel);
mysqli_stmt_bind_param($stmtDeleteAluguel, "i", $id_aluguel);
mysqli_stmt_execute($stmtDeleteAluguel);

// Delete da tabela de veículos alugados
$sqlDeleteVeiculoAlugado = "DELETE FROM tb_veiculo_alugado WHERE aluguel_id = ?";
$stmtDeleteVeiculoAlugado = mysqli_prepare($conexao, $sqlDeleteVeiculoAlugado);
mysqli_stmt_bind_param($stmtDeleteVeiculoAlugado, "i", $id_aluguel);
mysqli_stmt_execute($stmtDeleteVeiculoAlugado);

mysqli_stmt_close($stmt);
mysqli_close($conexao);
header('Location: index.html');
