<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

require_once 'conexao.php';

require_once "operacoes.php";

$resultados = cadastro_pessoa($conexao, $nome, $endereco, $telefone);

header("Location: index.html");

?>