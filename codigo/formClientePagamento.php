<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="formSelecionarEmprestimo.php">
        Cliente: <br>
        <select name="id_cliente">
            <?php
            require_once "conexao.php";
            require_once "operacoes.php";

            $clientes = listarClientes($conexao);

            foreach ($clientes as $cliente) {
                $id_cliente = $cliente['id_cliente'];
                $nome = $cliente['nome'];
                $endereco = $cliente['endereco'];
                $telefone  = $cliente['telefone'];
                echo "<option value='$id_cliente'>$nome</option>";
            }
            ?>
        </select>
        <input type="submit" value="Selecionar cliente">
    </form>
</body>

</html>