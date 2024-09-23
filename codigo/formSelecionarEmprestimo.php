<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="formPagamento.php" method="GET">
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";

        // Verifica se o parâmetro id_cliente foi passado e se é válido
        $id_cliente = $_GET['id_cliente'] ?? null;

        if ($id_cliente) {
            // Lista os empréstimos do cliente
            $emprestimos = listarEmprestimoCliente($conexao, $id_cliente);

            // Verifica se há empréstimos registrados
            $quantidade = count($emprestimos);
            if ($quantidade > 0) {
                echo "Empréstimos: <br>";
                echo "<select name='id_aluguel' required>";
                
                foreach ($emprestimos as $emprestimo) {
                    $id_aluguel = $emprestimo[0] ?? '';
                    $datainicial_aluguel = $emprestimo[1] ?? '';
                    $datafinal_aluguel = $emprestimo[2] ?? '';

                    // Exibe as opções com datas formatadas
                    echo "<option value='$id_aluguel'>$datainicial_aluguel até $datafinal_aluguel</option>";
                }
                echo "</select><br><br>";
                echo "<input type='hidden' name='id_cliente' value='$id_cliente'>";
                echo "<input type='submit' value='Preencher dados do pagamento'>";
            } else {
                // Mensagem exibida quando não há empréstimos para o cliente
                echo "Não há empréstimos para esse cliente.";
            }
        } else {
            echo "ID de cliente inválido ou não informado.";
        }
        ?>
    </form>
</body>

</html>
