<?php
/**
 * Cadastra um novo cliente.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $nome Nome do cliente.
 * @param string $endereco Endereço do cliente.
 * @param string $telefone Telefone do cliente.
 * @return int ID do cliente inserido.
 */
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

/**
 * Cadastra uma pessoa física.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $nome Nome da pessoa física.
 * @param string $endereco Endereço da pessoa física.
 * @param string $telefone Telefone da pessoa física.
 * @param string $cpf CPF da pessoa física.
 */
function cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf)
{
    $id_cliente = cadastro_cliente($conexao, $nome, $endereco, $telefone);
    $sql = "INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $cpf, $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

/**
 * Cadastra uma empresa.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $nome Nome da empresa.
 * @param string $endereco Endereço da empresa.
 * @param string $telefone Telefone da empresa.
 * @param string $cnpj CNPJ da empresa.
 */
function cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj)
{
    $id_cliente = cadastro_cliente($conexao, $nome, $endereco, $telefone);
    $sql = "INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $cnpj, $id_cliente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

/**
 * Salva um novo funcionário.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $nome_funcionario Nome do funcionário.
 * @param string $cpf_funcionario CPF do funcionário.
 * @param string $email_funcionario Email do funcionário.
 * @param string $telefone_funcionario Telefone do funcionário.
 * @return int|bool ID do funcionário inserido ou false em caso de erro.
 */
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

/**
 * Salva um novo veículo.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $nome Nome do veículo.
 * @param string $marca Marca do veículo.
 * @param int $ano Ano do veículo.
 * @param string $tipo_veiculo Tipo do veículo.
 * @param string $placa_veiculo Placa do veículo.
 * @param string $capacidade_veiculo Capacidade do veículo.
 * @param string $vidroeletrico_veiculo Indicação se possui vidro elétrico.
 * @param string $airbag_veiculo Indicação se possui airbag.
 * @param string $capacidaportamala_veiculo Capacidade do porta-malas.
 * @param string $arcondicionado_veiculo Indicação se possui ar-condicionado.
 * @param string $automatico_veiculo Indicação se é automático.
 * @param string $km_veiculo Quilometragem do veículo.
 * @return int ID do veículo inserido.
 */
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

/**
 * Salva um novo empréstimo.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $datainicial_aluguel Data inicial do aluguel.
 * @param string $datafinal_aluguel Data final do aluguel.
 * @param int $tb_funcionario_id_funcionario ID do funcionário associado.
 * @param int $tb_cliente_id_cliente ID do cliente associado.
 * @return int ID do aluguel inserido.
 */
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

/**
 * Associa um veículo a um empréstimo, com o KM inicial.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $tb_aluguel_id_aluguel ID do aluguel associado.
 * @param int $tb_veiculo_id_veiculo ID do veículo associado.
 * @return int ID do registro de veículo no aluguel.
 */
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

/**
 * Obtém o KM inicial de um veículo.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $id_veiculo ID do veículo.
 * @return int KM inicial do veículo.
 */
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

/**
 * Insere um novo pagamento no banco de dados para um aluguel específico.
 *
 * @param object $conexao Conexão com o banco de dados.
 * @param int $tb_aluguel_id_aluguel ID do aluguel associado ao pagamento.
 * @param float $valor Valor do pagamento.
 * @param float $preco_por_km Preço por km cobrado no aluguel.
 * @param string $data_pagamento Data do pagamento.
 * @param string $metodo Método de pagamento.
 * @return int ID do pagamento inserido.
 */
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

/**
 * Atualiza o km final de um veículo associado a um aluguel.
 *
 * @param object $conexao Conexão com o banco de dados.
 * @param float $km_final Km final registrado.
 * @param int $tb_aluguel_id_aluguel ID do aluguel.
 * @param int $tb_veiculo_id_veiculo ID do veículo.
 */
function atualiza_km_final($conexao, $km_final, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo)
{
    $sql = "UPDATE tb_aluguel_has_tb_veiculo SET km_final = ? WHERE tb_aluguel_id_aluguel = ? AND tb_veiculo_id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "dii", $km_final, $tb_aluguel_id_aluguel, $tb_veiculo_id_veiculo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    // Atualiza o km atual do veículo
    atualiza_km_atual($conexao, $km_final, $tb_veiculo_id_veiculo);
}

/**
 * Atualiza o km atual de um veículo.
 *
 * @param object $conexao Conexão com o banco de dados.
 * @param float $km_veiculo Km atualizado do veículo.
 * @param int $id_veiculo ID do veículo.
 */
function atualiza_km_atual($conexao, $km_veiculo, $id_veiculo)
{
    $sql = "UPDATE tb_veiculo SET km_veiculo = ? WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ii", $km_veiculo, $id_veiculo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

/**
 * Retorna uma lista de funcionários com ID e nome.
 *
 * @param object $conexao Conexão com o banco de dados.
 * @return array Lista de funcionários (ID e nome).
 */
function listarFuncionarios($conexao)
{
    $sql = "SELECT id_funcionario, nome_funcionario FROM tb_funcionario";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_funcionario, $nome_funcionario);
    mysqli_stmt_store_result($stmt);

    $lista = [];

    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $lista[] = [
                'id_funcionario' => $id_funcionario,
                'nome_funcionario' => $nome_funcionario
            ];
        }
    }

    mysqli_stmt_close($stmt);

    return $lista;
}

/**
 * Lista todos os clientes com detalhes de contato.
 *
 * @param object $conexao Conexão com o banco de dados.
 * @return array Lista de clientes com detalhes (ID, nome, endereço, telefone).
 */
function listarClientes($conexao)
{
    $sql = "SELECT id_cliente, nome, endereco, telefone FROM tb_cliente";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_cliente, $nome, $endereco, $telefone);
    mysqli_stmt_store_result($stmt);

    $lista = [];

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

    mysqli_stmt_close($stmt);

    return $lista;
}

/**
 * Retorna uma lista com todos os veículos.
 *
 * @param object $conexao Conexão com o banco de dados.
 * @return array Lista de veículos com detalhes.
 */
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
