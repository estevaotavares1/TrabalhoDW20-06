<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

require_once 'conexao.php';
require_once "operacoes.php";

if (!empty($nome) && !empty($endereco) && !empty($telefone) && !empty($cpf)) {
    cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf);
    header('Location: atividades.php');
    exit;
} else {
    echo "Por favor, preencha todos os campos.";
}
