<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

require_once 'conexao.php';
require_once "operacoes.php";

cadastro_cliente($conexao, $nome, $endereco, $telefone);
cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf);

?>