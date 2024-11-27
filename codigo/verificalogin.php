<?php
require_once 'conexao.php';

$email_funcionario = $_POST['email_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];

$sqlFuncionario = "SELECT * FROM tb_funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
$resultadoFuncionario = mysqli_query($conexao, $sqlFuncionario);

if (mysqli_num_rows($resultadoFuncionario) > 0) {
    session_start();

    $funcionario = mysqli_fetch_assoc($resultadoFuncionario);
    $_SESSION['logado'] = true;
    $_SESSION['nome_funcionario'] = $funcionario['nome_funcionario'];
    $_SESSION['id_funcionario'] = $funcionario['id_funcionario'];
    header('Location: atividades.php');
    exit();
} else {
    header('Location: index.html');
    exit();
}
