<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];

require_once 'conexao.php';

$sql = "INSERT INTO tb_empresa (nome, endereco, telefone, cnpj) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ssss", $nome, $endereco, $telefone, $cnpj);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("Location: index.html");
?>
