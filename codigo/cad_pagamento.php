<?php

$valor = $_POST['valor'];
$preco_por_km = $_POST['preco_por_km'];
$data_pagamento = $_POST['data_pagamento'];
$metodo = $_POST['metodo_pagamento'];  // Alterei para refletir o nome correto no formulário
$id_aluguel = $_POST['id_aluguel'];

require_once 'conexao.php';

// Inserção dos dados na tabela usando consultas preparadas
$sql = "INSERT INTO tb_pagamento (valor, preco_por_km, data_pagamento, metodo_pagamento, aluguel_id) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

// Vinculação dos parâmetros (valor: double, preço do km: double, data: string, metodo: string, id_aluguel: int)
mysqli_stmt_bind_param($stmt, "ddssi", $valor, $preco_por_km, $data_pagamento, $metodo, $id_aluguel);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

?>
