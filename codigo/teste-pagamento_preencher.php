<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançar Pagamento</title>
    <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Lançar Pagamento</h2>
        <form action="pagamento_finalizar.php" method="POST">
            <input type="hidden" name="id_aluguel" value="<?php echo $_GET['id_aluguel']; ?>">
            <input type="hidden" name="valor" id="valor">

            <h4>Veículos</h4>
            <hr>
            <?php
            require_once "conexao.php";
            require_once "operacoes.php";

            $carros = listarVeiculosEmprestimo($conexao, $_GET['id_aluguel']);

            foreach ($carros as $carroEmprestimo) {
                $veiculo = listarVeiculoPorId($conexao, $carroEmprestimo[0]);
                if (count($veiculo) === 12) {
                    echo "<input type='hidden' name='id_veiculo[]' value='{$veiculo[0]}'>";
                    echo "<div class='mb-3'>";
                    echo "<p><strong>Veículo:</strong> {$veiculo[1]} - {$veiculo[2]}</p>";
                    echo "<p><strong>Km Inicial:</strong> <span class='km-inicial' data-kminicial='{$veiculo[11]}'>{$veiculo[11]}</span></p>";
                    echo "<label for='kmpercorrido' class='form-label'>Km Percorrido:</label>";
                    echo "<input type='number' name='kmpercorrido[]' class='form-control kmpercorrido' step='0.01' required>";
                    echo "<p class='total-veiculo'>Total Veículo: R$ 0.00</p>";
                    echo "</div>";
                    echo "<hr>";
                } else {
                    echo "<p>Erro ao carregar informações do veículo.</p>";
                }
            }
            ?>

            <p id="total-km" class="mt-4"><strong>Soma total de Km percorridos:</strong> 0.00</p>
            <p id="valor-final" class="mt-4"><strong>Valor Final:</strong> R$ 0.00</p>

            <div class="text-center">
                <input type="submit" value="Lançar Pagamento" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            function recalcularValores() {
                let totalKmPercorrido = 0;
                let precoPorKm = parseFloat($("#preco_por_km").val()) || 0;

                $(".kmpercorrido").each(function(index) {
                    let kmPercorrido = parseFloat($(this).val()) || 0;
                    if (kmPercorrido < 0) {
                        alert("O valor de Km percorrido não pode ser negativo!");
                        $(this).val("");
                        kmPercorrido = 0;
                    }

                    totalKmPercorrido += kmPercorrido;

                    let valorVeiculo = kmPercorrido * precoPorKm;
                    $(this).closest('.mb-3').find('.total-veiculo').text(`Total Veículo: R$ ${valorVeiculo.toFixed(2)}`);
                });

                $("#total-km").text(`Soma total de Km percorridos: ${totalKmPercorrido.toFixed(2)}`);

                let valorFinal = precoPorKm * totalKmPercorrido;
                $("#valor-final").text(`Valor Final: R$ ${valorFinal.toFixed(2)}`);
                $("#valor").val(valorFinal.toFixed(2)); // Atualiza o valor no campo oculto
            }

            $(".calculo, .kmpercorrido").on("input", function() {
                recalcularValores();
            });

            recalcularValores();
        });
    </script>

</body>

</html>