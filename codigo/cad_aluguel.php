<?php

$datainicial_aluguel = $_POST['datainicial_aluguel'];
$kminicial_aluguel= $_POST['kminicial_aluguel'];
$preço_do_km_aluguel = $_POST['preço_do_km_aluguel'];
$dataprevista_aluguel = $_POST['dataprevista_aluguel'];

require_once 'conexao.php';

// Inserção dos dados na tabela
$sql = "INSERT INTO tb_aluguel (datainicial_aluguel, kminicial_aluguel, preço_do_km_aluguel, dataprevista_aluguel) VALUES ('$datainicial_aluguel', '$kminicial_aluguel', '$preço_do_km_aluguel', '$dataprevista_aluguel')";

if (mysqli_query($conexao, $sql)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_close($conexao);
?>
