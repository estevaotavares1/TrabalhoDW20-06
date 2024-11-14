<?php

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
 * Obtém os dados de um veículo específico pelo seu ID.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $id ID do veículo.
 * @return array Dados do veículo (ID, nome, marca, ano, placa, capacidade, e outros atributos).
 */
function listarVeiculoPorId($conexao, $id)
{
    $sql = "SELECT id_veiculo, nome, marca, ano, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo FROM tb_veiculo WHERE id_veiculo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_veiculo, $nome, $marca, $ano, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo);

    $result = [];
    while (mysqli_stmt_fetch($stmt)) {
        $result = [$id_veiculo, $nome, $marca, $ano, $placa_veiculo, $capacidade_veiculo, $vidroeletrico_veiculo, $airbag_veiculo, $capacidaportamala_veiculo, $arcondicionado_veiculo, $automatico_veiculo, $km_veiculo];
    }

    mysqli_stmt_close($stmt);
    return $result;
}

/**
 * Lista os empréstimos pendentes de um cliente específico.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $id_cliente ID do cliente.
 * @return array Lista de empréstimos pendentes (ID do aluguel, ID do funcionário, ID do cliente, data inicial e final do aluguel).
 */
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

/**
 * Lista os veículos associados a um empréstimo específico.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $id_aluguel ID do aluguel.
 * @return array Lista de veículos do empréstimo (ID do veículo e quilometragem inicial).
 */
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