<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];

require_once 'conexao.php';

// Inserção dos dados na tabela tb_cliente
$sql_cliente = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('$nome', '$endereco', '$telefone')";

if (mysqli_query($conexao, $sql_cliente)) {
    // Obtenha o ID do cliente recém-criado
    $id_cliente = mysqli_insert_id($conexao);

    // Inserção do CNPJ na tabela tb_empresa
    $sql_empresa = "INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('$cnpj', '$id_cliente')";

    if (mysqli_query($conexao, $sql_empresa)) {
        header('Location: index.html');
        exit();
    } else {
        echo "Ocorreu um erro ao inserir o CNPJ. Tente novamente.";
    }
} else {
    echo "Ocorreu um erro ao inserir o cliente. Tente novamente.";
}

mysqli_close($conexao);
?>
