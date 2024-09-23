<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formSelecionarCarros.php" method="post">
        <label for="datainicial_aluguel">Data Inicial do Empréstimo</label>
        <input type="date" id="datainicial_aluguel" name="datainicial_aluguel" required><br><br>

        <label for="datafinal_aluguel">Data Final do Empréstimo</label>
        <input type="date" id="datafinal_aluguel" name="datafinal_aluguel" required><br><br>

        Funcionário: <br>
        <select name="id_funcionario" required>
            <?php
                require_once "conexao.php";
                require_once "operacoes.php";

                $funcionarios = listarFuncionarios($conexao);

                if (!empty($funcionarios)) {
                    foreach ($funcionarios as $funcionario) {
                        $id_funcionario = $funcionario[0];
                        $nome_funcionario = $funcionario[1];
                        echo "<option value='$id_funcionario'>$nome_funcionario</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum funcionário disponível</option>";
                }
            ?>
        </select> <br><br>

        Cliente: <br>
        <select name="id_cliente" required>
            <?php
                $clientes = listarClientes($conexao);

                if (!empty($clientes)) {
                    foreach ($clientes as $cliente) {
                        $id_cliente = $cliente[0];
                        $nome = $cliente[1];
                        echo "<option value='$id_cliente'>$nome</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum cliente disponível</option>";
                }
            ?>
        </select> <br><br>

        <input type="submit" value="Selecionar carros">
    </form>
</body>
</html>
