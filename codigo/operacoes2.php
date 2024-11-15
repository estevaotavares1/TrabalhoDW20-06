<?php
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
