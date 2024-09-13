<?php

$nome_funcionario = $_POST['nome_funcionario'];
$cpf_funcionario = $_POST['cpf_funcionario'];
$email_funcionario = $_POST['email_funcionario'];
$telefone_funcionario = $_POST['telefone_funcionario'];

require_once 'conexao.php';
require_once "operacoes.php";

salvarFuncionario($conexao, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);

    // $sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES (?, ?, ?, ?)";

    // $stmt = mysqli_prepare($conexao, $sql);

    // mysqli_stmt_bind_param($stmt, "sisi", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);

    // mysqli_stmt_execute($stmt);

    // mysqli_stmt_close($stmt);

    // header("Location: index.html");
    header('Location: index.html');

?>