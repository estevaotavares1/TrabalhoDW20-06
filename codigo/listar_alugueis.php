<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aluguéis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Aluguéis</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Cliente</th>
                        <th>Funcionário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'conexao.php';
                    require_once 'operacoes.php';

                    $alugueis = imprimirAlugueis($conexao);

                    if (!empty($alugueis)) {
                        foreach ($alugueis as $aluguel) {
                            $id_aluguel = $aluguel['id_aluguel'];
                            $datainicial_aluguel = $aluguel['datainicial_aluguel'];
                            $datafinal_aluguel = $aluguel['datafinal_aluguel'];
                            $nome_cliente = $aluguel['nome_cliente'];
                            $nome_funcionario = $aluguel['nome_funcionario'];

                            echo "<tr>";
                            echo "<td>$id_aluguel</td>";
                            echo "<td>$datainicial_aluguel</td>";
                            echo "<td>$datafinal_aluguel</td>";
                            echo "<td>$nome_cliente</td>";
                            echo "<td>$nome_funcionario</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nenhum aluguel encontrado.</td></tr>";
                    }

                    mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
