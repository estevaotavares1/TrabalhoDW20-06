<?php
require_once 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    // Query de atualização
    $sql = "UPDATE tb_cliente SET nome = ?, endereco = ?, telefone = ? WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nome, $endereco, $telefone, $id_cliente);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: listar_clientes.php"); // Redireciona para a lista de clientes
        exit;
    } else {
        echo "Erro ao atualizar cliente: " . mysqli_error($conexao);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conexao); // Fecha a conexão com o banco de dados
?>