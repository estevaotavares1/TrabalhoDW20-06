<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Empréstimo</title>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulário de Empréstimo</h2>
        <form id="emprestimo" action="formSelecionarVeiculos.php" method="GET">
            <div class="mb-3">
                <label for="datainicial_aluguel" class="form-label">Data Inicial do Empréstimo</label>
                <input type="date" id="datainicial_aluguel" name="datainicial_aluguel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="datafinal_aluguel" class="form-label">Data Final do Empréstimo</label>
                <input type="date" id="datafinal_aluguel" name="datafinal_aluguel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="id_funcionario" class="form-label">Funcionário</label>
                <select name="id_funcionario" id="id_funcionario" class="form-select" required>
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
                </select>
            </div>

            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select name="id_cliente" id="id_cliente" class="form-select" required>
                    <?php
                    $clientes = listarClientes($conexao);

                    foreach ($clientes as $cliente) {
                        $id_cliente = $cliente['id_cliente'];
                        $nome = $cliente['nome'];
                        echo "<option value='$id_cliente'>$nome</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="text-center">
                <input type="submit" value="Selecionar veículos" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var dataAtual = new Date().toISOString().split("T")[0];
            $("#datainicial_aluguel").attr("min", dataAtual);

            jQuery.validator.addMethod(
                "dataFinalMaiorQueInicial",
                function(value, element) {
                    var dataInicial = $("#datainicial_aluguel").val();
                    return (
                        this.optional(element) ||
                        new Date(value) >= new Date(dataInicial)
                    );
                },
                "A data final não pode ser anterior à data inicial."
            );

            $("#emprestimo").validate({
                rules: {
                    datainicial_aluguel: {
                        required: true,
                        date: true,
                    },
                    datafinal_aluguel: {
                        required: true,
                        date: true,
                        dataFinalMaiorQueInicial: true,
                    }
                },
                messages: {
                    datainicial_aluguel: {
                        required: "A data inicial do empréstimo é obrigatória.",
                        date: "Por favor, insira uma data válida.",
                    },
                    datafinal_aluguel: {
                        required: "A data final do empréstimo é obrigatória.",
                        date: "Por favor, insira uma data válida.",
                        dataFinalMaiorQueInicial: "A data final não pode ser anterior à data inicial.",
                    }
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>