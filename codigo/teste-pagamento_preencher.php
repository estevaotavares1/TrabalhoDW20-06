<input type="hidden" name="valor" id="valor">

<p id="total-km" class="mt-4"><strong>Soma total de Km percorridos:</strong> 0.00</p>
<p id="valor-final" class="mt-4"><strong>Valor Final:</strong> R$ 0.00</p>

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

<p id="total-km" class="mt-4"><strong>Soma total de Km percorridos:</strong> 0.00</p>

<script>
    $(document).ready(function() {
        function recalcularValores() {
            let totalKmPercorrido = 0;

            // Percorre todos os campos de km percorridos e soma os valores
            $(".kmpercorrido").each(function() {
                let kmPercorrido = parseFloat($(this).val()) || 0;
                if (kmPercorrido < 0) {
                    alert("O valor de Km percorrido não pode ser negativo!");
                    $(this).val("");
                    kmPercorrido = 0;
                }

                totalKmPercorrido += kmPercorrido;
            });

            // Exibe a soma total de km percorridos
            $("#total-km").text(`Soma total de Km percorridos: ${totalKmPercorrido.toFixed(2)}`);
        }

        // Atualiza os valores sempre que o usuário altera algum valor
        $(".kmpercorrido").on("input", function() {
            recalcularValores();
        });

        recalcularValores(); // Inicializa a soma ao carregar a página
    });
</script>