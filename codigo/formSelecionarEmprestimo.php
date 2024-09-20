<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="formPagamento.php">
        <?php
        require_once "conexao.php";
        require_once "operacoes.php";
        
        $emprestimos = listarEmprestimoCliente($conexao, $_GET['id_cliente']);
        
        $quantidade = sizeof($emprestimos);
        if ($quantidade > 0) {
            echo "Emprestimos: <br>";
            echo "<select name='id_aluguel'>";
            foreach ($emprestimos as $emprestimo) {
                $id_aluguel = $emprestimo[0];
                $id_funcionario = $emprestimo[1];
                $id_cliente = $emprestimo[2];
                $datainicial_aluguel = $emprestimo[3];
                $datafinal_aluguel = $emprestimo[5];

                echo "<option value='$id_aluguel'>$datainicial_aluguel>$datafinal_aluguel</option>";
            }
            echo "</select><br><br>";
            echo "<input type='submit' value='Preencher dados do pagamento'>";
        }
        else {
            echo "Não há empréstimos para esse cliente.";
        }
        ?>
    </form>
</body>

</html>