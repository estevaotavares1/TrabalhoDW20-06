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
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'conexao.php';
            require_once 'operacoes.php';

            $funcionarios = imprimirFuncionarios($conexao);

            if (!empty($funcionarios)) {
                foreach ($funcionarios as $funcionario) {
                    $id_funcionario = $funcionario['id_funcionario'];
                    $nome_funcionario = $funcionario['nome_funcionario'];
                    $cpf_funcionario = $funcionario['cpf_funcionario'];
                    $email_funcionario = $funcionario['email_funcionario'];
                    $telefone_funcionario = $funcionario['telefone_funcionario'];

                    echo "<tr>";
                    echo "<td>$id_funcionario</td>";
                    echo "<td>$nome_funcionario</td>";
                    echo "<td>$cpf_funcionario</td>";
                    echo "<td>$email_funcionario</td>";
                    echo "<td>$telefone_funcionario</td>";
                    echo "<td><a href='editar_funcionario.php?id_funcionario=$id_funcionario' class='btn btn-warning'>Editar</a></td>";
                    echo "<td><a href='excluir_funcionario.php?id_funcionario=$id_funcionario' class='btn btn-danger'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum funcionário encontrado.</td></tr>";
            }

            mysqli_close($conexao);
            ?>
        </tbody>
    </table>

</body>

</html>