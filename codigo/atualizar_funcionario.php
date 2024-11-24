<?php
require_once 'conexao.php';
require_once "operacoes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_funcionario = $_GET['id_funcionario'];
    $nome_funcionario = $_POST['nome_funcionario'];
    $cpf_funcionario = $_POST['cpf_funcionario'];
    $email_funcionario = $_POST['email_funcionario'];
    $telefone_funcionario = $_POST['telefone_funcionario'];
    $senha_funcionario = $_POST['senha_funcionario'];

    if (!empty($nome_funcionario) && !empty($cpf_funcionario) && !empty($email_funcionario) && !empty($telefone_funcionario) && !empty($senha_funcionario)) {
        atualizar_funcionario($conexao, $id_funcionario, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario, $senha_funcionario);
        header('Location: listar_funcionarios.php');
        exit;
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}
