<?php
require_once 'testalogin.php';
require_once "conexao.php";

if (isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $tipo = $_GET['tipo'];

  if ($tipo == 'p') {
    $sql = "SELECT * FROM tb_cliente as c, tb_pessoafisica as p WHERE p. tb_cliente_id_cliente = c.id_cliente and c.id_cliente = $id_cliente";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $endereco = $linha['endereco'];
    $telefone = $linha['telefone'];
    $cpf = $linha['cpf_pessoa'];
  }

  if ($tipo == 'e') {
    $sql = "SELECT * FROM tb_cliente as c, tb_empresa as e WHERE e. tb_cliente_id_cliente = c.id_cliente and c.id_cliente = $id_cliente";
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

?>