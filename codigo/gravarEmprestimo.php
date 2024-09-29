<?php

require_once "conexao.php";
require_once "operacoes.php";

$tb_cliente_id_cliente = $_GET['id_cliente'];
$tb_funcionario_id_funcionario = $_GET['id_funcionario'];
$datainicial_aluguel = $_GET['datainicial_aluguel'];
$datafinal_aluguel = $_GET['datafinal_aluguel'];
$carros = $_GET['carros'];

// grava o empréstimo e armazena o id gerado
$id_aluguel = salvarEmprestimo($conexao, $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario,$tb_cliente_id_cliente);

// grava cada um dos carros selecionados
foreach ($carros as $carro) {
    salvarVeiculoEmprestimo($conexao, $id_aluguel, $carro);
}

header("Location: index.html");
?>