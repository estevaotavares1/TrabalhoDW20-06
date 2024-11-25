<?php
require_once 'conexao.php';
require_once "operacoes.php";
$tipo = $_POST['tipo'];

if ($tipo == 'p') {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    if (!empty($nome) && !empty($endereco) && !empty($telefone) && !empty($cpf)) {
        $stmt = $conexao->prepare("SELECT COUNT(*) FROM tb_pessoafisica WHERE cpf_pessoa = ?");
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            header('Location: erro.php');
            exit;
        }

        cadastro_pessoafisica($conexao, $nome, $endereco, $telefone, $cpf);
        header('Location: atividades.php');
        exit;
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

if ($tipo == 'e') {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cnpj = $_POST['cnpj'];

    if (!empty($nome) && !empty($endereco) && !empty($telefone) && !empty($cnpj)) {
        $stmt = $conexao->prepare("SELECT COUNT(*) FROM tb_empresa WHERE cnpj_empresa = ?");
        $stmt->bind_param("s", $cnpj);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            header('Location: erro.php');
            exit;
        }

        cadastro_empresa($conexao, $nome, $endereco, $telefone, $cnpj);
        header('Location: atividades.php');
        exit;
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
