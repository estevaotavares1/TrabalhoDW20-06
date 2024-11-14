<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css" />
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

                $veiculos = listarVeiculosDisponiveis($conexao);

                // Exibe os Carros
                echo "<div class='col-12 mb-4'><h4>Veículos Disponíveis</h4></div>";
                foreach ($veiculos as $veiculo) {
                    echo "
                        <div class='col-md-6 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$veiculo['nome']}</h5>
                                    <p class='card-text'>
                                        Marca: {$veiculo['marca']}<br>
                                        Ano: {$veiculo['ano']}<br>
                                        Placa: {$veiculo['placa_veiculo']}<br>
                                        Capacidade: {$veiculo['capacidade_veiculo']}<br>
                                        Vidro Elétrico: {$veiculo['vidroeletrico_veiculo']}<br>
                                        Airbag: {$veiculo['airbag_veiculo']}<br>
                                        Porta-malas: {$veiculo['capacidaportamala_veiculo']}<br>
                                        Ar-condicionado: {$veiculo['arcondicionado_veiculo']}<br>
                                        Automático: {$veiculo['automatico_veiculo']}<br>
                                        KM: {$veiculo['km_veiculo']}
                                    </p>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='checkbox' name='veiculos[]' value='{$veiculo['id_veiculo']}' id='veiculo{$veiculo['id_veiculo']}'>
                                        <label class='form-check-label' for='veiculo{$veiculo['id_veiculo']}'>
                                            Selecionar este carro
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
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