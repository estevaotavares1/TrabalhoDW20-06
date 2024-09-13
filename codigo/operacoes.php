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
function salvarVeiculo($conexao, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo,$km_veiculo ) {
    $sql = "INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo   ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ssisssssssss", $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo);
    mysqli_stmt_execute($stmt);

    $id = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);

    return $id;
}
function salvarEmprestimo($conexao, $idfuncionario, $idcliente) {
  $sql = "INSERT INTO tb_aluguel (tb_cliente_idcliente, tb_funcionario_id_funcionario) VALUES (?, ?)";
  $stmt = mysqli_prepare($conexao, $sql);

  mysqli_stmt_bind_param($stmt, "ii", $tb_cliente_id_cliente, $tb_funcionario_id_funcionario);
  mysqli_stmt_execute($stmt);

  $id = mysqli_stmt_insert_id($stmt);
  mysqli_stmt_close($stmt);

  return $id;
}
function salvarVeiculoEmprestimo($conexao, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo) {

  $km_inicial = kmInicialVeiculo($conexao, $id_veiculo);
  $km_final = 0;

  $sql = "INSERT INTO tb_aluguel_has_tb_veiculo (tb_aluguel_id_aluguel, tb_veiculo_id_veiculo, km_inicial, km_final) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexao, $sql);

  mysqli_stmt_bind_param($stmt, "iiss", $tb_aluguel_id_aluguel, $idveiculo, $km_inicial, $km_final);
  mysqli_stmt_execute($stmt);

  $id = mysqli_stmt_insert_id($stmt);
  mysqli_stmt_close($stmt);

  return $id;
}
function kmInicialVeiculo($conexao, $id_veiculo) {
  $sql = "SELECT km_veiculo FROM tb_veiculo WHERE id_veiculo = ?";
  $stmt = mysqli_prepare($conexao, $sql);

  mysqli_stmt_bind_param($stmt, 'i', $id_veiculo);
  mysqli_stmt_execute($stmt);

  mysqli_stmt_bind_result($stmt, $km);

  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  return $km;
}
function efetuarPagamento($conexao, $tb_aluguel_id_aluguel, $valor, $preco_por_km, $metodo) {
  $sql = "INSERT INTO tb_pagamento (tb_aluguel_id_aluguel, valor, preco_por_km, metodo) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexao, $sql);

  mysqli_stmt_bind_param($stmt, "idds", $tb_aluguel_id_aluguel, $valor, $preco_por_km, $metodo);
  mysqli_stmt_execute($stmt);

  $id = mysqli_stmt_insert_id($stmt);
  mysqli_stmt_close($stmt);

  return $id;
}

function atualiza_km_final($conexao, $km_final, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo) {
  $sql = "UPDATE tb_aluguel_has_tb_veiculo SET km_final = ? WHERE tb_aluguel_id_aluguel = ? AND tb_veiculo_id_veiculo = ?";
  $stmt = mysqli_prepare($conexao, $sql);

  mysqli_stmt_bind_param($stmt, "dii", $km_final, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo);
  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);

  atualiza_km_atual($conexao, $km_final, $tb_veiculo_id_veiculo);
}

?>

