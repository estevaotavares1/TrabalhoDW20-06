<?php

$valor = $_POST['valor'];
$preco_por_km = $_POST['preco_por_km'];
$data_pagamento = $_POST['data_pagamento'];
$metodo = $_POST['metodo'];

require_once 'conexao.php';

// Inserção dos dados na tabela usando consultas preparadas
$sql = "INSERT INTO tb_pagamento (valor, preco_por_km, data_pagamento, metodo) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

// Vinculação dos parâmetros (data: string, km inicial: double, preço do km: double, data prevista: string)
mysqli_stmt_bind_param($stmt, "d,d,s,s", $valor, $preco_por_km, $data_pagamento, $metodo  );

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

?>