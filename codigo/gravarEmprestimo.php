<?php

require_once "conexao.php";
require_once "operacoes.php";

$tb_cliente_id_cliente = $_GET['$tb_cliente_id_cliente'];
$tb_funcionario_id_funcionario = $_GET['tb_funcionario_id_funcionario'];
$carros = $_GET['carros'];

// grava o empréstimo e armazena o id gerado
$id_aluguel = salvarEmprestimo($conexao, $tb_cliente_id_cliente, $tb_funcionario_id_funcionario);

// grava cada um dos carros selecionados
foreach ($carros as $carro) {
    salvarVeiculoEmprestimo($conexao, $id_aluguel, $carro);
}

header("Location: index.html");
?>