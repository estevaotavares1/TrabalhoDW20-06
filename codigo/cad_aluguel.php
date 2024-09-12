<?php

$datainicial_aluguel = $_POST['datainicial_aluguel'];
$datafinal_aluguel = $_POST['datafinal_aluguel'];

require_once 'conexao.php';

// Inserção dos dados na tabela usando consultas preparadas
$sql = "INSERT INTO tb_aluguel (datainicial_aluguel, datafinal_aluguel) VALUES (?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

// Vinculação dos parâmetros (data: string, km inicial: double, preço do km: double, data prevista: string)
mysqli_stmt_bind_param($stmt, "ss", $datainicial_aluguel, $datafinal_aluguel);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

?>