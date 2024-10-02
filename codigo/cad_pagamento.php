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
mysqli_stmt_bind_param($stmt, "dsssi", $valor, $preco_por_km, $data_pagamento, $metodo, $id_aluguel);
mysqli_stmt_execute($stmt);

// Atualiza o status dos veículos relacionados ao aluguel
$sqlUpdateVeiculo = "UPDATE tb_veiculo SET status = 'Disponível' WHERE id_veiculo IN (SELECT id_veiculo FROM tb_aluguel_has_tb_veiculo WHERE tb_aluguel_id_aluguel = ?)";
$stmtUpdateVeiculo = mysqli_prepare($conexao, $sqlUpdateVeiculo);
mysqli_stmt_bind_param($stmtUpdateVeiculo, "i", $id_aluguel);
mysqli_stmt_execute($stmtUpdateVeiculo);

$sqlUpdateVeiculo = "UPDATE tb_aluguel SET status = 'Pago' WHERE id_aluguel = ?";
$stmtUpdateVeiculo = mysqli_prepare($conexao, $sqlUpdateVeiculo);
mysqli_stmt_bind_param($stmtUpdateVeiculo, "i", $id_aluguel);
mysqli_stmt_execute($stmtUpdateVeiculo);
mysqli_stmt_close($stmtUpdateVeiculo);

// Delete da tabela de veículos alugados
// $sqlDeleteVeiculoAlugado = "DELETE FROM tb_veiculo_alugado WHERE aluguel_id = ?";

// Excluir o registro da tabela tb_pagamento primeiro
// $sqlDeletePagamento = "DELETE FROM tb_pagamento WHERE tb_aluguel_id_aluguel = ?";
// $stmtDeletePagamento = mysqli_prepare($conexao, $sqlDeletePagamento);
// mysqli_stmt_bind_param($stmtDeletePagamento, "i", $id_aluguel);
// mysqli_stmt_execute($stmtDeletePagamento);

// Exclui primeiro os registros da tabela tb_aluguel_has_tb_veiculo (para remover as referências)
$sqlDeleteVeiculoAlugado = "DELETE FROM tb_aluguel_has_tb_veiculo WHERE tb_aluguel_id_aluguel = ?";
$stmtDeleteVeiculoAlugado = mysqli_prepare($conexao, $sqlDeleteVeiculoAlugado);
mysqli_stmt_bind_param($stmtDeleteVeiculoAlugado, "i", $id_aluguel);
mysqli_stmt_execute($stmtDeleteVeiculoAlugado);

// Agora exclui o registro da tabela tb_aluguel
// $sqlDeleteAluguel = "DELETE FROM tb_aluguel WHERE id_aluguel = ?";
// $stmtDeleteAluguel = mysqli_prepare($conexao, $sqlDeleteAluguel);
// mysqli_stmt_bind_param($stmtDeleteAluguel, "i", $id_aluguel);
// mysqli_stmt_execute($stmtDeleteAluguel);

mysqli_stmt_close($stmt);
mysqli_close($conexao);
header('Location: index.html');
