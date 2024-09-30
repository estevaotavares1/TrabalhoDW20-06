<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Empréstimo</title>
</head>

<body>
    <form action="formSelecionarCarros.php" method="GET">
        <label for="datainicial_aluguel">Data Inicial do Empréstimo</label>
        <input type="date" id="datainicial_aluguel" name="datainicial_aluguel" required><br><br>

        <label for="datafinal_aluguel">Data Final do Empréstimo</label>
        <input type="date" id="datafinal_aluguel" name="datafinal_aluguel" required><br><br>
        
        Funcionário: <br>
        <select name="id_funcionario">
            <?php
            require_once "conexao.php";
            require_once "operacoes.php";

            $funcionarios = listarFuncionarios($conexao);

            foreach ($funcionarios as $funcionario) {
                $id_funcionario = $funcionario['id_funcionario'];
                $nome_funcionario = $funcionario['nome_funcionario'];
                echo "<option value='$id_funcionario'>$nome_funcionario</option>";
            }
            ?>
        </select><br><br>

        Cliente: <br>
        <select name="id_cliente">
            <?php
            $clientes = listarClientes($conexao);

            foreach ($clientes as $cliente) {
                $id_cliente = $cliente['id_cliente'];
                $nome = $cliente['nome'];
                echo "<option value='$id_cliente'>$nome</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Selecionar carros">
    </form>
</body>

</html>
