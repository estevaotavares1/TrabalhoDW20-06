<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

require_once 'conexao.php';

// Inserção dos dados na tabela tb_cliente
$sql_cliente = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('$nome', '$endereco', '$telefone')";

if (mysqli_query($conexao, $sql_cliente)) {
    // Obtenha o ID do cliente recém-criado
    $id_cliente = mysqli_insert_id($conexao);

    // Inserção do CPF na tabela tb_pessoafisica
    $sql_pessoa_fisica = "INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('$cpf', '$id_cliente')";

    if (mysqli_query($conexao, $sql_pessoa_fisica)) {
        header('Location: index.html');
        exit();
    } else {
        echo "Ocorreu um erro ao inserir o CPF. Tente novamente.";
    }
} else {
    echo "Ocorreu um erro ao inserir o cliente. Tente novamente.";
}

mysqli_close($conexao);
?>
