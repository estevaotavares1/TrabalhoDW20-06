<?php

$tipo_veiculo = $_POST['tipo_veiculo'];
$placa_veiculo = $_POST['placa_veiculo'];
$capacidade_veiculo = $_POST['capacidade_veiculo'];
$vidroeletrico_veiculo = $_POST['vidroeletrico_veiculo'];
$airbag_veiculo = $_POST['airbag_veiculo'];
$capacidaportamala_veiculo = $_POST['capacidaportamala_veiculo'];
$arcondicionado_veiculo = $_POST['arcondicionado_veiculo'];
$automatico_veiculo = $_POST['automatico_veiculo'];
$km_veiculo = $_POST['km_veiculo'];
$km_veiculofinal = $_POST['km_veiculofinal'];

require_once 'conexao.php';

// Inserção dos dados na tabela
$sql = "INSERT INTO tb_veiculo (tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo, km_veiculofinal) VALUES ('$tipo_veiculo', '$placa_veiculo', '$capacidade_veiculo', '$vidroeletrico_veiculo', '$airbag_veiculo', '$capacidaportamala_veiculo', '$arcondicionado_veiculo', '$automatico_veiculo', '$km_veiculo', '$km_veiculofinal')";

if (mysqli_query($conexao, $sql)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_close($conexao);
?>
