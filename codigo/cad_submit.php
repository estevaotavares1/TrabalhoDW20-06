<?php
require_once 'conexao.php';
require_once "operacoes.php";
$tipo = $_POST['tipo'];

if ($tipo == 'p') {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    if (!empty($nome) && !empty($endereco) && !empty($telefone) && !empty($cpf)) {
        cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf);
        header('Location: atividades.php');
        exit;
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

if ($tipo == 'e') {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cnpj = $_POST['cnpj'];

    if (!empty($nome) && !empty($endereco) && !empty($telefone) && !empty($cnpj)) {
        cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj);
        header('Location: atividades.php');
        exit;
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
