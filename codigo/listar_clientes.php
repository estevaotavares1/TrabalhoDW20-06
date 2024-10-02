<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
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
                    echo "<td><a href='editar_cliente.php?id_cliente=$id_cliente' class='btn btn-warning'>Editar</a></td>";
                    echo "<td><a href='excluir_cliente.php?id_cliente=$id_cliente' class='btn btn-danger'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum cliente encontrado.</td></tr>";
            }

            mysqli_close($conexao);
            ?>
        </tbody>
    </table>

</body>

</html>