<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];

require_once 'conexao.php';
require_once "operacoes.php";

if (!empty($nome) && !empty($endereco) && !empty($telefone) && !empty($cnpj)) {
    cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj);
    header('Location: atividades.php');
    exit;
} else {
    echo "Por favor, preencha todos os campos.";
}
