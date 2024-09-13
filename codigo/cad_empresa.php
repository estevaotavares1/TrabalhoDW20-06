<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];

require_once 'conexao.php';
require_once "operacoes.php";

cadastro_cliente($conexao, $nome, $endereco, $telefone);
cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj);
header('Location: index.html');

?>