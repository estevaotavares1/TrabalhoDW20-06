<?php
require_once "conexao.php";
require_once "operacoes.php";

$id_cliente = 1;
$id_funcionario = 1;
$carros = [2, 4];

// salvar o emprestimo
$id_aluguel = salvarEmprestimo($conexao, $id_funcionario , $id_cliente);

// salvar os veiculos
foreach ($carros as $id) {
    salvarVeiculoEmprestimo($conexao, $id_aluguel, $id);
}
?>