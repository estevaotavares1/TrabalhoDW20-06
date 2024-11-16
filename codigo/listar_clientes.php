<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Clientes</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>CPF/CNPJ</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'conexao.php';
                    require_once 'operacoes.php';

                    $clientes = imprimirClientes($conexao);

                    if (!empty($clientes)) {
                        foreach ($clientes as $cliente) {
                            $id_cliente = $cliente['id_cliente'];
                            $nome = $cliente['nome'];
                            $endereco = $cliente['endereco'];
                            $telefone = $cliente['telefone'];
                            $cpf_pessoa = $cliente['cpf_pessoa'];
                            $cnpj_empresa = $cliente['cnpj_empresa'];

                            // Verifica se o cliente é pessoa física ou empresa
                            $documento = $cpf_pessoa ? $cpf_pessoa : $cnpj_empresa;

                            echo "<tr>";
                            echo "<td>$id_cliente</td>";
                            echo "<td>$nome</td>";
                            echo "<td>$endereco</td>";
                            echo "<td>$telefone</td>";
                            echo "<td>$documento</td>";
                            echo "<td>
                                    <a href='editar_cliente.php?id_cliente=$id_cliente' class='btn btn-warning btn-sm'>Editar</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nenhum cliente encontrado.</td></tr>";
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