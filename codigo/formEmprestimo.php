<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formSelecionarCarros.php">
        Funcionário: <br>
        <select name="id_funcionario">
            <?php
                require_once "conexao.php";
                require_once "operacoes.php";

                $funcionarios = listarFuncionarios($conexao);

                foreach ($funcionarios as $funcionario) {
                    $id_funcionario = $funcionario[0];
                    $nome_funcionario = $funcionario[1];
                    echo "<option value='$id_funcionario'>$nome_funcionario</option>";
                }
            ?>
        </select> <br><br>
        Cliente: <br>
        <select name="id_cliente">
            <?php
                $clientes = listarClientes($conexao);

                foreach ($clientes as $cliente) {
                    $id_cliente = $cliente[0];
                    $nome = $cliente[1];
                    $endereco = $cliente[2];
                    $telefone  = $cliente[3];
                    echo "<option value='$id_cliente'>$nome</option>";
                }
            ?>
        </select> <br><br>

        <input type="submit" value="Selecionar carros">
    </form>
</body>
</html>