<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

require_once 'conexao.php';

$sql = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ssi", $nome, $endereco, $telefone);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
////////////////////////////////////////////////////////////////////////////////////////////////
$sql2 = "INSERT INTO tb_pessoafisica (cpf_pessoa) VALUES (?)";

$stmt2 = mysqli_prepare($conexao, $sql2);

mysqli_stmt_bind_param($stmt2, "i", $cpf_pessoa);

mysqli_stmt_execute($stmt2);

mysqli_stmt_close($stmt2);

header("Location: index.html");

?>