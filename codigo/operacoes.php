<?php
function cadastro_cliente($conexao, $nome, $endereco, $telefone)
{
    $sql = "INSERT INTO tb_cliente (nome, endereco, telefone) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nome, $endereco, $telefone);
    mysqli_stmt_execute($stmt);
    $id_cliente = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    return $id_cliente;
}

function cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf)
{
    $id_cliente = cadastro_cliente($conexao, $nome, $endereco, $telefone);
    $sql = "INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $cpf, $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj)
{
    $id_cliente = cadastro_cliente($conexao, $nome, $endereco, $telefone);
    $sql = "INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $cnpj, $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function salvarFuncionario($conexao, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario)
{
    $sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);

    if (mysqli_stmt_execute($stmt)) {
        $id = mysqli_insert_id($conexao);
        mysqli_stmt_close($stmt);
        return $id;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function salvarVeiculo($conexao, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo)
{
    $sql = "INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ssisssssssss", $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo);
    mysqli_stmt_execute($stmt);

    $id = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    return $id;
}

function salvarEmprestimo($conexao, $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario, $tb_cliente_id_cliente)
{
    $sql = "INSERT INTO tb_aluguel (datainicial_aluguel, datafinal_aluguel, tb_funcionario_id_funcionario, tb_cliente_id_cliente) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ssii", $datainicial_aluguel, $datafinal_aluguel, $tb_funcionario_id_funcionario, $tb_cliente_id_cliente);
    mysqli_stmt_execute($stmt);

    $id = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    return $id;
}

function salvarVeiculoEmprestimo($conexao, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo)
{
    $km_inicial = kmInicialVeiculo($conexao, $tb_veiculo_id_veiculo);
    $km_final = 0;

    $sql = "INSERT INTO tb_aluguel_has_tb_veiculo (tb_aluguel_id_aluguel, tb_veiculo_id_veiculo, km_inicial, km_final) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "iiss", $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo, $km_inicial, $km_final);
    mysqli_stmt_execute($stmt);

    $id = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    return $id;
}

function kmInicialVeiculo($conexao, $id_veiculo)
{
    $sql = "SELECT km_veiculo FROM tb_veiculo WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, 'i', $id_veiculo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $km);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $km;
}

function efetuarPagamento($conexao, $tb_aluguel_id_aluguel, $valor, $preco_por_km, $data_pagamento, $metodo)
{
    $sql = "INSERT INTO tb_pagamento (tb_aluguel_id_aluguel, valor, preco_por_km, data_pagamento, metodo) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "idsis", $tb_aluguel_id_aluguel, $valor, $preco_por_km, $data_pagamento, $metodo);
    mysqli_stmt_execute($stmt);

    $id = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    return $id;
}

function atualiza_km_final($conexao, $km_final, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo)
{
    $sql = "UPDATE tb_aluguel_has_tb_veiculo SET km_final = ? WHERE tb_aluguel_id_aluguel = ? AND tb_veiculo_id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "dii", $km_final, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    atualiza_km_atual($conexao, $km_final, $tb_veiculo_id_veiculo);
}

function atualiza_km_atual($conexao, $km_veiculo, $id_veiculo)
{
    $sql = "UPDATE tb_veiculo SET km_veiculo = ? WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ii", $km_veiculo, $id_veiculo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function listarFuncionarios($conexao)
{
    $sql = "SELECT id_funcionario, nome_funcionario FROM tb_funcionario";
    $stmt = mysqli_prepare($conexao, $sql);

    // Executa a consulta
    mysqli_stmt_execute($stmt);

    // Vincula os resultados às variáveis
    mysqli_stmt_bind_result($stmt, $id_funcionario, $nome_funcionario);
    mysqli_stmt_store_result($stmt);

    $lista = [];

    // Verifica se há registros e preenche o array associativo
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_funcionario' => $id_funcionario,
                'nome_funcionario' => $nome_funcionario
            ];
        }
    }

    // Fecha a instrução
    mysqli_stmt_close($stmt);

    return $lista;
}

function listarClientes($conexao)
{
    $sql = "SELECT id_cliente, nome, endereco, telefone FROM tb_cliente";
    $stmt = mysqli_prepare($conexao, $sql);

    // Executa a consulta
    mysqli_stmt_execute($stmt);

    // Vincula os resultados às variáveis
    mysqli_stmt_bind_result($stmt, $id_cliente, $nome, $endereco, $telefone);
    mysqli_stmt_store_result($stmt);

    $lista = [];

    // Verifica se há registros e preenche o array associativo
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_cliente' => $id_cliente,
                'nome' => $nome,
                'endereco' => $endereco,
                'telefone' => $telefone
            ];
        }
    }

    // Fecha a instrução
    mysqli_stmt_close($stmt);

    return $lista;
}

function listarVeiculos($conexao)
{
    $sql = "SELECT * FROM tb_veiculo";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_veiculo, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo);
    mysqli_stmt_store_result($stmt);

    $lista = [];
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [$id_veiculo, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo];
        }
    }

    mysqli_stmt_close($stmt);
    return $lista;
}

function listarVeiculoPorId($conexao, $id)
{
    $sql = "SELECT id_veiculo, nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo FROM tb_veiculo WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_veiculo, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo);

    $result = [];
    while (mysqli_stmt_fetch($stmt)) {
        $result = [$id_veiculo, $nome, $marca, $ano, $tipo_veiculo, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo];
    }

    mysqli_stmt_close($stmt);
    return $result;
}

function listarEmprestimoCliente($conexao, $id_cliente)
{
    $sql = "SELECT * FROM tb_aluguel WHERE tb_cliente_id_cliente = ? AND status = 'Pendente'";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id_aluguel, $id_funcionario, $id_cliente, $datainicial_aluguel, $datafinal_aluguel, $status);

    $lista = [];
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [$id_aluguel, $id_funcionario, $id_cliente, $datainicial_aluguel, $datafinal_aluguel];
        }
    }

    mysqli_stmt_close($stmt);
    return $lista;
}

function listarVeiculosEmprestimo($conexao, $id_aluguel)
{
    $sql = "SELECT tb_veiculo_id_veiculo, km_inicial FROM tb_aluguel_has_tb_veiculo WHERE tb_aluguel_id_aluguel = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id_aluguel);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id_veiculo, $km_veiculo);

    $lista = [];
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [$id_veiculo, $km_veiculo];
        }
    }

    mysqli_stmt_close($stmt);
    return $lista;
}

function listarVeiculosDisponiveis($conexao)
{
    $sql = "SELECT * FROM tb_veiculo WHERE status = 'Disponível'";
    $resultado = mysqli_query($conexao, $sql);
    $veiculos = [];

    while ($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }

    return $veiculos;
}

// As funções do Listar ------------------------------------------------------------------------------------------------------------
// As funções do Listar ------------------------------------------------------------------------------------------------------------
// As funções do Listar ------------------------------------------------------------------------------------------------------------
// As funções do Listar ------------------------------------------------------------------------------------------------------------
// As funções do Listar ------------------------------------------------------------------------------------------------------------

function imprimirFuncionarios($conexao)
{
    $sql = "SELECT * FROM tb_funcionario";
    $stmt = mysqli_prepare($conexao, $sql);

    // Executa a consulta
    mysqli_stmt_execute($stmt);

    // Vincula os resultados às variáveis
    mysqli_stmt_bind_result($stmt, $id_funcionario, $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario);
    mysqli_stmt_store_result($stmt);

    $lista = [];

    // Verifica se há registros e preenche o array associativo
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_funcionario' => $id_funcionario,
                'nome_funcionario' => $nome_funcionario,
                'cpf_funcionario' => $cpf_funcionario,
                'email_funcionario' => $email_funcionario,
                'telefone_funcionario' => $telefone_funcionario
            ];
        }
    }

    // Fecha a instrução
    mysqli_stmt_close($stmt);

    return $lista;
}

function imprimirClientes($conexao)
{
    // Consulta que une tb_cliente, tb_pessoafisica e tb_empresa para diferenciar por CPF e CNPJ
    $sql = "SELECT 
                c.id_cliente, 
                c.nome, 
                c.endereco, 
                c.telefone, 
                pf.cpf_pessoa, 
                e.cnpj_empresa
            FROM tb_cliente c
            LEFT JOIN tb_pessoafisica pf ON c.id_cliente = pf.tb_cliente_id_cliente
            LEFT JOIN tb_empresa e ON c.id_cliente = e.tb_cliente_id_cliente";

    $stmt = mysqli_prepare($conexao, $sql);

    // Executa a consulta
    mysqli_stmt_execute($stmt);

    // Vincula os resultados às variáveis
    mysqli_stmt_bind_result($stmt, $id_cliente, $nome, $endereco, $telefone, $cpf_pessoa, $cnpj_empresa);
    mysqli_stmt_store_result($stmt);

    $lista = [];

    // Verifica se há registros e preenche o array associativo
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_cliente' => $id_cliente,
                'nome' => $nome,
                'endereco' => $endereco,
                'telefone' => $telefone,
                'cpf_pessoa' => $cpf_pessoa,
                'cnpj_empresa' => $cnpj_empresa
            ];
        }
    }

    // Fecha a instrução
    mysqli_stmt_close($stmt);

    return $lista;
}

function imprimirVeiculosDisponiveis($conexao)
{
    $sql = "SELECT * FROM tb_veiculo WHERE status = 'Disponível'";
    $resultado = mysqli_query($conexao, $sql);
    $veiculos = [];

    while ($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }

    return $veiculos;
}

function imprimirVeiculosIndisponiveis($conexao)
{
    $sql = "SELECT * FROM tb_veiculo WHERE status = 'Indisponível'";
    $resultado = mysqli_query($conexao, $sql);
    $veiculos = [];

    while ($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }

    return $veiculos;
}

function imprimirAlugueis($conexao)
{
    $sql = "SELECT 
                a.id_aluguel, 
                a.datainicial_aluguel, 
                a.datafinal_aluguel, 
                c.nome AS nome_cliente, 
                f.nome_funcionario AS nome_funcionario
            FROM tb_aluguel a
            JOIN tb_cliente c ON a.tb_cliente_id_cliente = c.id_cliente
            JOIN tb_funcionario f ON a.tb_funcionario_id_funcionario = f.id_funcionario";
    
    $stmt = mysqli_prepare($conexao, $sql);
    
    // Executa a consulta
    mysqli_stmt_execute($stmt);
    
    // Vincula os resultados às variáveis
    mysqli_stmt_bind_result($stmt, $id_aluguel, $datainicial_aluguel, $datafinal_aluguel, $nome_cliente, $nome_funcionario);
    mysqli_stmt_store_result($stmt);
    
    $lista = [];
    
    // Preenche o array associativo se houver registros
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_aluguel' => $id_aluguel,
                'datainicial_aluguel' => $datainicial_aluguel,
                'datafinal_aluguel' => $datafinal_aluguel,
                'nome_cliente' => $nome_cliente,
                'nome_funcionario' => $nome_funcionario
            ];
        }
    }
    
    // Fecha a instrução
    mysqli_stmt_close($stmt);
    
    return $lista;
}

function imprimirPagamentos($conexao)
{
    $sql = "SELECT 
                p.id_pagamento, 
                p.valor, 
                p.preco_por_km, 
                p.data_pagamento, 
                p.metodo, 
                a.id_aluguel
            FROM tb_pagamento p
            JOIN tb_aluguel a ON p.tb_aluguel_id_aluguel = a.id_aluguel";
    
    $stmt = mysqli_prepare($conexao, $sql);
    
    // Executa a consulta
    mysqli_stmt_execute($stmt);
    
    // Vincula os resultados às variáveis
    mysqli_stmt_bind_result($stmt, $id_pagamento, $valor, $preco_por_km, $data_pagamento, $metodo, $id_aluguel);
    mysqli_stmt_store_result($stmt);
    
    $lista = [];
    
    // Preenche o array associativo se houver registros
    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_pagamento' => $id_pagamento,
                'valor' => $valor,
                'preco_por_km' => $preco_por_km,
                'data_pagamento' => $data_pagamento,
                'metodo' => $metodo,
                'id_aluguel' => $id_aluguel
            ];
        }
    }
    
    // Fecha a instrução
    mysqli_stmt_close($stmt);
    
    return $lista;
}
