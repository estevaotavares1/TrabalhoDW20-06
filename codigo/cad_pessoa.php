<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

require_once 'conexao.php';

$sql = "INSERT INTO tb_pessoa (nome, endereco, telefone, cpf) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ssss", $nome, $endereco, $telefone, $cpf);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("Location: index.html");
?>
