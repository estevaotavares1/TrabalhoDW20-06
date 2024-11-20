<?php

$nome_funcionario = $_POST['nome_funcionario'];
$cpf_funcionario = $_POST['cpf_funcionario'];
$email_funcionario = $_POST['email_funcionario'];
$telefone_funcionario = $_POST['telefone_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];

require_once 'conexao.php';
require_once "operacoes.php";

if (!empty($nome_funcionario) && !empty($cpf_funcionario) && !empty($email_funcionario) && !empty($telefone_funcionario) && !empty($senha_funcionario)) {
    $stmt = $conexao->prepare("SELECT COUNT(*) FROM tb_funcionario WHERE email_funcionario = ?");
    $stmt->bind_param("s", $email_funcionario);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        header('Location: error.php');
        exit;
    }

    salvarFuncionario($conexao, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario, $senha_funcionario);
    header('Location: atividades.php');
    exit;
} else {
    echo "Por favor, preencha todos os campos.";
}
