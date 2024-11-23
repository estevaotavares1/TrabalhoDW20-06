<?php
require_once 'conexao.php';
require_once "operacoes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_GET['id_cliente'];
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    if (!empty($nome) && !empty($endereco) && !empty($telefone)) {
        atualizar_cliente($conexao, $id_cliente, $nome, $endereco, $telefone);

        if ($tipo == 'p') {
            $cpf = $_POST['cpf'];
            if (!empty($cpf)) {
                atualizar_pessoafisica($conexao, $id_cliente, $cpf);
            } else {
                echo "Por favor, preencha o CPF.";
                exit;
            }
        }

        if ($tipo == 'e') {
            $cnpj = $_POST['cnpj'];
            if (!empty($cnpj)) {
                atualizar_empresa($conexao, $id_cliente, $cnpj);
            } else {
                echo "Por favor, preencha o CNPJ.";
                exit;
            }
        }

        header('Location: listar_clientes.php');
        exit;
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}
