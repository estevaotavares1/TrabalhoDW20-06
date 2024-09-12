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


?>