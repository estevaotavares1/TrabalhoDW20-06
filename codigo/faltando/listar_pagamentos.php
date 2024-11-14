<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pagamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Pagamentos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Valor</th>
                        <th>Preço por KM</th>
                        <th>Data do Pagamento</th>
                        <th>Método</th>
                        <th>ID Aluguel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'conexao.php';
                    require_once 'operacoes.php';

                    $pagamentos = imprimirPagamentos($conexao);

                    if (!empty($pagamentos)) {
                        foreach ($pagamentos as $pagamento) {
                            $id_pagamento = $pagamento['id_pagamento'];
                            $valor = $pagamento['valor'];
                            $preco_por_km = $pagamento['preco_por_km'];
                            $data_pagamento = $pagamento['data_pagamento'];
                            $metodo = $pagamento['metodo'];
                            $id_aluguel = $pagamento['id_aluguel'];

                            echo "<tr>";
                            echo "<td>$id_pagamento</td>";
                            echo "<td>$valor</td>";
                            echo "<td>$preco_por_km</td>";
                            echo "<td>$data_pagamento</td>";
                            echo "<td>$metodo</td>";
                            echo "<td>$id_aluguel</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Nenhum pagamento encontrado.</td></tr>";
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
