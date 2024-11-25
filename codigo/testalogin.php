<?php
session_start();
if (isset($_SESSION['logado']) == false) {
    header('Location: index.html');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');
$nomeFuncionario = $_SESSION['nome_funcionario'];
$dataAtual = date('d/m/Y - H:i');
?>