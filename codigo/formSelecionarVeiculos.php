<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Veículos Disponíveis</h3>

        <form action="gravarEmprestimo.php" method="GET">
            <div class="row">
                <?php
                require_once "conexao.php";
                require_once "operacoes.php";

                $datainicial_aluguel = $_GET['datainicial_aluguel'];
                $datafinal_aluguel = $_GET['datafinal_aluguel'];

                // Chama a função que lista apenas os veículos disponíveis
                $carros = listarVeiculosDisponiveis($conexao);

                // Inicia contadores para separação
                $motos = [];
                $carrosTipo = [];

                // Separa os carros e motos
                foreach ($carros as $carro) {
                    if (strtolower($carro['tipo_veiculo']) == 'moto') {
                        $motos[] = $carro;
                    } else {
                        $carrosTipo[] = $carro;
                    }
                }

                // Exibe as motos
                if (!empty($motos)) {
                    echo "<div class='col-12 mb-4'><h4>Motos Disponíveis</h4></div>";
                    foreach ($motos as $moto) {
                        echo "
                        <div class='col-md-6 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$moto['nome']}</h5>
                                    <p class='card-text'>
                                        Marca: {$moto['marca']}<br>
                                        Ano: {$moto['ano']}<br>
                                        Tipo: {$moto['tipo_veiculo']}<br>
                                        Placa: {$moto['placa_veiculo']}<br>
                                        Capacidade: {$moto['capacidade_veiculo']}<br>
                                        Vidro Elétrico: {$moto['vidroeletrico_veiculo']}<br>
                                        Airbag: {$moto['airbag_veiculo']}<br>
                                        Porta-malas: {$moto['capacidaportamala_veiculo']}<br>
                                        Ar-condicionado: {$moto['arcondicionado_veiculo']}<br>
                                        Automático: {$moto['automatico_veiculo']}<br>
                                        KM: {$moto['km_veiculo']}
                                    </p>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='checkbox' name='carros[]' value='{$moto['id_veiculo']}' id='carro{$moto['id_veiculo']}'>
                                        <label class='form-check-label' for='carro{$moto['id_veiculo']}'>
                                            Selecionar esta moto
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }

                // Exibe os carros
                if (!empty($carrosTipo)) {
                    echo "<div class='col-12 mb-4'><h4>Carros Disponíveis</h4></div>";
                    foreach ($carrosTipo as $carro) {
                        echo "
                        <div class='col-md-6 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$carro['nome']}</h5>
                                    <p class='card-text'>
                                        Marca: {$carro['marca']}<br>
                                        Ano: {$carro['ano']}<br>
                                        Tipo: {$carro['tipo_veiculo']}<br>
                                        Placa: {$carro['placa_veiculo']}<br>
                                        Capacidade: {$carro['capacidade_veiculo']}<br>
                                        Vidro Elétrico: {$carro['vidroeletrico_veiculo']}<br>
                                        Airbag: {$carro['airbag_veiculo']}<br>
                                        Porta-malas: {$carro['capacidaportamala_veiculo']}<br>
                                        Ar-condicionado: {$carro['arcondicionado_veiculo']}<br>
                                        Automático: {$carro['automatico_veiculo']}<br>
                                        KM: {$carro['km_veiculo']}
                                    </p>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='checkbox' name='carros[]' value='{$carro['id_veiculo']}' id='carro{$carro['id_veiculo']}'>
                                        <label class='form-check-label' for='carro{$carro['id_veiculo']}'>
                                            Selecionar este carro
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }
                ?>
            </div>

            <input type="hidden" name="datainicial_aluguel" value="<?php echo $_GET['datainicial_aluguel']; ?>">
            <input type="hidden" name="datafinal_aluguel" value="<?php echo $_GET['datafinal_aluguel']; ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $_GET['id_cliente']; ?>">
            <input type="hidden" name="id_funcionario" value="<?php echo $_GET['id_funcionario']; ?>">

            <div class="text-center">
                <input type="submit" value="Gravar" class="btn btn-primary mt-3">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
