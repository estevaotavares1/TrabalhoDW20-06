<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Funcionários</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
                            echo "<td>
                                    <a href='editar_funcionario.php?id_funcionario=$id_funcionario' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='excluir_funcionario.php?id_funcionario=$id_funcionario' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nenhum funcionário encontrado.</td></tr>";
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