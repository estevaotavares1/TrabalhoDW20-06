<?php

require_once "conexao.php";
require_once "operacoes.php";

$tb_cliente_id_cliente = $_GET['id_cliente'];
$tb_funcionario_id_funcionario = $_GET['id_funcionario'];
$datainicial_aluguel = $_GET['datainicial_aluguel'];
$datafinal_aluguel = $_GET['datafinal_aluguel'];
$veiculos = $_GET['veiculos'];

// Grava o empréstimo
$id_aluguel = salvarEmprestimo($conexao, $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario, $tb_cliente_id_cliente);

foreach ($veiculos as $veiculo) {
    salvarVeiculoEmprestimo($conexao, $id_aluguel, $veiculo);

    // Atualiza o status do veículo para 'Indisponível'
    $sql = "UPDATE tb_veiculo SET status = 'Indisponível' WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $veiculo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sqlUpdateVeiculo = "UPDATE tb_aluguel SET status = 'Pendente' WHERE id_aluguel = ?";
    $stmtUpdateVeiculo = mysqli_prepare($conexao, $sqlUpdateVeiculo);
    mysqli_stmt_bind_param($stmtUpdateVeiculo, "i", $id_aluguel);
    mysqli_stmt_execute($stmtUpdateVeiculo);
    mysqli_stmt_close($stmtUpdateVeiculo);
}

header("Location: success.php");
exit();
