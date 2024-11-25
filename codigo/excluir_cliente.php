<?php
require_once "conexao.php";
require_once "operacoes.php";

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $tipo = $_GET['tipo'];

    $sql_verificar_aluguel = "SELECT * FROM tb_aluguel WHERE tb_cliente_id_cliente = $id_cliente";
    $resultado_aluguel = mysqli_query($conexao, $sql_verificar_aluguel);

    if (mysqli_num_rows($resultado_aluguel) > 0) {
        header('Location: erro2.php');
        exit;
    }

    if ($tipo == 'p') {
        $sql = "SELECT * FROM tb_cliente as c, tb_pessoafisica as p WHERE p.tb_cliente_id_cliente = c.id_cliente AND c.id_cliente = $id_cliente";
        $resultado = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($resultado);
        $nome = $linha['nome'];
        $endereco = $linha['endereco'];
        $telefone = $linha['telefone'];
        $cpf = $linha['cpf_pessoa'];
    }

    if ($tipo == 'e') {
        $sql = "SELECT * FROM tb_cliente as c, tb_empresa as e WHERE e.tb_cliente_id_cliente = c.id_cliente AND c.id_cliente = $id_cliente";
        $resultado = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($resultado);
        $nome = $linha['nome'];
        $endereco = $linha['endereco'];
        $telefone = $linha['telefone'];
        $cnpj = $linha['cnpj_empresa'];
    }
} else {
    $id_cliente = 0;
    echo "Nenhum cliente encontrado";
}

if (!empty($nome) && !empty($endereco) && !empty($telefone)) {
    excluir_cliente($conexao, $id_cliente, $tipo);
    header('Location: listar_clientes.php');
    exit;
} else {
    echo "Cliente não encontrado.";
}
