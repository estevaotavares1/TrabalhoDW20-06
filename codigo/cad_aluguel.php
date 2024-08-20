<?php

$datainicial_aluguel = $_POST['datainicial_aluguel'];
$kminicial_aluguel = $_POST['kminicial_aluguel'];
$preço_do_km_aluguel = $_POST['preço_do_km_aluguel'];
$dataprevista_aluguel = $_POST['dataprevista_aluguel'];

require_once 'conexao.php';

// Inserção dos dados na tabela usando consultas preparadas
$sql = "INSERT INTO tb_aluguel (datainicial_aluguel, kminicial_aluguel, preço_do_km_aluguel, dataprevista_aluguel) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

// Vinculação dos parâmetros (data: string, km inicial: double, preço do km: double, data prevista: string)
mysqli_stmt_bind_param($stmt, "sdds", $datainicial_aluguel, $kminicial_aluguel, $preço_do_km_aluguel, $dataprevista_aluguel);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

?>