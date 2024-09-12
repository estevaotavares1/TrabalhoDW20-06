<?php
function cadastro_cliente($conexao, $nome, $endereco, $telefone)
{
    $sql = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nome, $endereco, $telefone);
    mysqli_stmt_execute($stmt);
    $id_cliente = mysqli_insert_id($conexao); // Obtém o ID do cliente inserido
    mysqli_stmt_close($stmt);
    
    return $id_cliente;
}

function cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf)
{
    // Insere o cliente e obtém o ID
    $id_cliente = cadastro_cliente($conexao, $nome, $endereco, $telefone);
    
    // Insere os dados específicos da pessoa física
    $sql = "INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $cpf, $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj)
{
    // Insere o cliente e obtém o ID
    $id_cliente = cadastro_cliente($conexao, $nome, $endereco, $telefone);
    
    // Insere os dados específicos da empresa
    $sql = "INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $cnpj, $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function salvarFuncionario($conexao, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario) {
  $sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexao, $sql);

  // CPF como string, logo usamos 's' no lugar de 'i'
  mysqli_stmt_bind_param($stmt, "ssss", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);

  // Executa a query
  if (mysqli_stmt_execute($stmt)) {
    $id = mysqli_insert_id($conexao); // Pega o ID da última inserção
    mysqli_stmt_close($stmt);
    return $id;
  } else {
    // Em caso de erro, pode-se retornar false ou tratar o erro de outra maneira
    mysqli_stmt_close($stmt);
    return false;
  }
}

?>