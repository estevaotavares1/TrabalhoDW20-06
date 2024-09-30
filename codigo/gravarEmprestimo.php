<?php

require_once "conexao.php";
require_once "operacoes.php";

$tb_cliente_id_cliente = $_GET['id_cliente'];
$tb_funcionario_id_funcionario = $_GET['id_funcionario'];
$datainicial_aluguel = $_GET['datainicial_aluguel'];
$datafinal_aluguel = $_GET['datafinal_aluguel'];
$carros = $_GET['carros'];

// Grava o empréstimo e armazena o ID gerado
$id_aluguel = salvarEmprestimo($conexao, $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario, $tb_cliente_id_cliente);

// Grava cada um dos carros selecionados
foreach ($carros as $carro) {
    salvarVeiculoEmprestimo($conexao, $id_aluguel, $carro);
    
    // Atualiza o status do veículo para 'Indisponível'
    $sql = "UPDATE tb_veiculo SET status = 'Indisponível' WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $carro);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: index.html");
exit();
?>
