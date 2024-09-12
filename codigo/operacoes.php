  <?php

function cadastro_pessoa($conexao, $nome, $endereco, $telefone)
{
    $sql = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $nome, $endereco, $telefone);
    mysqli_stmt_execute($stmt);

    $sql2 = "INSERT INTO tb_pessoafisica (cpf_pessoa) VALUES (?)";
    $stmt2 = mysqli_prepare($conexao, $sql2);
    mysqli_stmt_bind_param($stmt2, "i", $cpf_pessoa);
    mysqli_stmt_execute($stmt2);

    $id = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);

    return $id;
}

function cadastro_empresa($conexao, $nome, $endereco, $telefone)
{
    $sql = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $nome, $endereco, $telefone);
    mysqli_stmt_execute($stmt);

    $sql2 = "INSERT INTO tb_empresa (cnpj_empresa) VALUES (?)";
    $stmt2 = mysqli_prepare($conexao, $sql2);
    mysqli_stmt_bind_param($stmt2, "i", $cnpj_empresa);
    mysqli_stmt_execute($stmt2);

    $id = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);

    return $id;
}
function salvarFuncionario($conexao, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario) {
  $sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexao, $sql);

  mysqli_stmt_bind_param($stmt, "sisi", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);
  mysqli_stmt_execute($stmt);

  $id = mysqli_stmt_insert_id($stmt);
  mysqli_stmt_close($stmt);

  return $id;
}
function salvarVeiculo($conexao, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo,$km_veiculo ) {
    $sql = "INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo   ) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $km, $marca, $modelo);
    mysqli_stmt_execute($stmt);

    $id = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);

    return $id;
}

?>