<?php
require_once "conexao.php";
require_once "operacoes.php";

if (isset($_GET['id_funcionario'])) {
    $id_funcionario = $_GET['id_funcionario'];

    $sql_verificar_aluguel = "SELECT * FROM tb_aluguel WHERE tb_funcionario_id_funcionario = $id_funcionario";
    $resultado_aluguel = mysqli_query($conexao, $sql_verificar_aluguel);

    if (mysqli_num_rows($resultado_aluguel) > 0) {
        header('Location: erro2.php');
        exit;
    } else {
        $sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = $id_funcionario";
        $resultado = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($resultado);
        $nome_funcionario = $linha['nome_funcionario'];
        $cpf_funcionario = $linha['cpf_funcionario'];
        $email_funcionario = $linha['email_funcionario'];
        $telefone_funcionario = $linha['telefone_funcionario'];
        $senha_funcionario = $linha['senha_funcionario'];
    }
} else {
    $id_funcionario = 0;
    echo "Nenhum funcionario encontrado";
}

if (!empty($nome_funcionario) && !empty($nome_funcionario) && !empty($cpf_funcionario) && !empty($email_funcionario) && !empty($telefone_funcionario) && !empty($senha_funcionario)) {
    excluir_funcionario($conexao, $id_funcionario);
    header('Location: listar_funcionarios.php');
    exit;
} else {
    echo "Funcionário não encontrado.";
}
