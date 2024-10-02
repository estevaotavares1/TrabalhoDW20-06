<?php
require_once 'conexao.php';

$email_funcionario = $_POST['email_funcionario'];
$cpf_funcionario = $_POST['cpf_funcionario'];

$sqlFuncionario = "SELECT * FROM tb_funcionario WHERE email_funcionario = '$email_funcionario' AND cpf_funcionario = '$cpf_funcionario'";
$resultadoFuncionario = mysqli_query($conexao, $sqlFuncionario);

if (mysqli_num_rows($resultadoFuncionario) > 0) {
    session_start();
    $_SESSION['logado'] = true;
    header('Location: atividades.php');
    exit();
} else {
    header('Location: index.html');
    exit();
}
