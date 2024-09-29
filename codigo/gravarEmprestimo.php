<?php

require_once "conexao.php";
require_once "operacoes.php";

$tb_cliente_id_cliente = $_GET['id_cliente'];
$tb_funcionario_id_funcionario = $_GET['id_funcionario'];
$datainicial_aluguel = $_GET['datainicial_aluguel'];
$datafinal_aluguel = $_GET['datafinal_aluguel'];
$carros = $_GET['carros'];

// grava o empréstimo e armazena o id gerado
$id_aluguel = salvarEmprestimo($conexao, $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario, $tb_cliente_id_cliente);

// grava cada um dos carros selecionados
foreach ($carros as $carro) {
    salvarVeiculoEmprestimo($conexao, $id_aluguel, $carro);
}

// Após inserir o aluguel, adicione:
$sql = "UPDATE tb_veiculo SET status = 'Indisponível' WHERE id_veiculo = ?";

// Prepare e execute
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_veiculo); // Assume que você já tem $id_veiculo
mysqli_stmt_execute($stmt);

header("Location: index.html");
