<?php

require_once "conexao.php";
require_once "operacoes.php";

// Usando ?? para garantir que os valores estejam definidos
$tb_cliente_id_cliente = $_GET['id_cliente'] ?? '';
$tb_funcionario_id_funcionario = $_GET['id_funcionario'] ?? '';
$datainicial_aluguel = $_GET['datainicial_aluguel'] ?? '';
$datafinal_aluguel = $_GET['datafinal_aluguel'] ?? '';
$carros = $_GET['carros'] ?? [];

// Verifica se os campos obrigatórios estão preenchidos
if (!empty($tb_cliente_id_cliente) && !empty($tb_funcionario_id_funcionario) && !empty($datainicial_aluguel) && !empty($datafinal_aluguel) && !empty($carros)) {

    // Grava o empréstimo e armazena o ID gerado
    $id_aluguel = salvarEmprestimo($conexao, $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario, $tb_cliente_id_cliente);

    // Grava cada um dos carros selecionados
    foreach ($carros as $carro) {
        salvarVeiculoEmprestimo($conexao, $id_aluguel, $carro);
    }

    // Redireciona para a página inicial
    header("Location: index.html");
    exit; // Adiciona um exit para evitar execução de código adicional

} else {
    echo "Por favor, preencha todos os campos obrigatórios.";
}
?>
