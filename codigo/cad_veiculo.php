<?php

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$ano = $_POST['ano'];
$placa_veiculo = $_POST['placa_veiculo'];
$capacidade_veiculo = $_POST['capacidade_veiculo'];
$vidroeletrico_veiculo = $_POST['vidroeletrico_veiculo'];
$airbag_veiculo = $_POST['airbag_veiculo'];
$capacidaportamala_veiculo = $_POST['capacidaportamala_veiculo'];
$arcondicionado_veiculo = $_POST['arcondicionado_veiculo'];
$automatico_veiculo = $_POST['automatico_veiculo'];
$km_veiculo = $_POST['km_veiculo'];

require_once 'conexao.php';
require_once "operacoes.php";

if (!empty($nome) && !empty($marca) && !empty($ano) && !empty($placa_veiculo) && !empty($capacidade_veiculo) && !empty($km_veiculo)) {
    salvarVeiculo($conexao, $nome, $marca, $ano, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo);
    header('Location: atividades.php');
    exit;
} else {
    echo "Por favor, preencha todos os campos obrigatórios.";
}
