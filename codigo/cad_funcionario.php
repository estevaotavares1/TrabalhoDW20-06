<?php

$nome_funcionario = $_POST['nome_funcionario'];
$cpf_funcionario = $_POST['cpf_funcionario'];
$email_funcionario = $_POST['email_funcionario'];
$telefone_funcionario = $_POST['telefone_funcionario'];

require_once 'conexao.php';

// Inserção dos dados na tabela
$sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('$nome_funcionario', '$cpf_funcionario', '$email_funcionario', '$telefone_funcionario')";

if (mysqli_query($conexao, $sql)) {
    header('Location: index.html');
    exit();
} else {
    echo "Ocorreu um erro. Tente novamente.";
}

mysqli_close($conexao);
?>
