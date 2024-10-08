<?php

$nome_funcionario = $_POST['nome_funcionario'] ?? '';
$cpf_funcionario = $_POST['cpf_funcionario'] ?? '';
$email_funcionario = $_POST['email_funcionario'] ?? '';
$telefone_funcionario = $_POST['telefone_funcionario'] ?? '';

require_once 'conexao.php';
require_once "operacoes.php";

if (!empty($nome_funcionario) && !empty($cpf_funcionario) && !empty($email_funcionario) && !empty($telefone_funcionario)) {
    salvarFuncionario($conexao, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);
    header('Location: atividades.php');
    exit; // Adiciona um exit para evitar execução de código adicional
} else {
    echo "Por favor, preencha todos os campos.";
}
