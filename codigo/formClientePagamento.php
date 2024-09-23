<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formSelecionarEmprestimo.php" method="GET">
        Cliente: <br>
        <select name="id_cliente" required>
            <?php
                require_once "conexao.php";
                require_once "operacoes.php";

                // Lista os clientes disponíveis
                $clientes = listarClientes($conexao);

                // Verifica se há clientes listados
                if (!empty($clientes)) {
                    foreach ($clientes as $cliente) {
                        $id_cliente = $cliente[0] ?? ''; // Garantindo que a variável esteja definida
                        $nome = $cliente[1] ?? '';
                        $endereco = $cliente[2] ?? '';
                        $telefone  = $cliente[3] ?? '';

                        // Exibe as opções do dropdown
                        echo "<option value='$id_cliente'>$nome</option>";
                    }
                } else {
                    echo "<option disabled>Nenhum cliente disponível</option>";
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Selecionar cliente">
    </form>
</body>
</html>
