<?php
require_once "conexao.php";
require_once "operacoes.php";

if (isset($_GET['id_veiculo'])) {
    $id_veiculo = $_GET['id_veiculo'];

    $sql_verificar_aluguel = "SELECT * FROM tb_aluguel_has_tb_veiculo WHERE tb_veiculo_id_veiculo = $id_veiculo";
    $resultado_aluguel = mysqli_query($conexao, $sql_verificar_aluguel);

    if (mysqli_num_rows($resultado_aluguel) > 0) {
        header('Location: erro2.php');
        exit;
    } else {
        $sql = "SELECT * FROM tb_veiculo WHERE id_veiculo = $id_veiculo";
        $resultado = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($resultado);
        $nome = $linha['nome'];
        $marca = $linha['marca'];
        $ano = $linha['ano'];
        $placa_veiculo = $linha['placa_veiculo'];
        $capacidade_veiculo = $linha['capacidade_veiculo'];
        $vidroeletrico_veiculo = $linha['vidroeletrico_veiculo'];
        $airbag_veiculo = $linha['airbag_veiculo'];
        $capacidaportamala_veiculo = $linha['capacidaportamala_veiculo'];
        $arcondicionado_veiculo = $linha['arcondicionado_veiculo'];
        $automatico_veiculo = $linha['automatico_veiculo'];
        $km_veiculo = $linha['km_veiculo'];
    }
} else {
    $id_veiculo = 0;
    echo "Nenhum veículo encontrado";
}

if (!empty($nome) && !empty($marca) && !empty($ano) && !empty($placa_veiculo)) {
    excluir_veiculo($conexao, $id_veiculo);
    header('Location: listar_veiculos.php');
    exit;
} else {
    echo "Veículo não encontrado.";
}
