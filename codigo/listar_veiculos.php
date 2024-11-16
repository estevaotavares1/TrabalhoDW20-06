<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css" />
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Veículos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Placa</th>
                        <th>Capacidade</th>
                        <th>Vidro Elétrico</th>
                        <th>Airbag</th>
                        <th>Porta-malas</th>
                        <th>Ar-condicionado</th>
                        <th>Automático</th>
                        <th>KM</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "conexao.php";
                    require_once "operacoes.php";

                    // Lista os veículos disponíveis e indisponíveis
                    $veiculosDisponiveis = imprimirVeiculosDisponiveis($conexao);
                    $veiculosIndisponiveis = imprimirVeiculosIndisponiveis($conexao);

                    // Função para exibir em formato de tabela
                    function exibirTabelaVeiculos($veiculos, $status)
                    {
                        foreach ($veiculos as $veiculo) {
                            $vidroEletrico = $veiculo['vidroeletrico_veiculo'] ? 'Sim' : 'Não';
                            $airbag = $veiculo['airbag_veiculo'] ? 'Sim' : 'Não';
                            $arCondicionado = $veiculo['arcondicionado_veiculo'] ? 'Sim' : 'Não';
                            $automatico = $veiculo['automatico_veiculo'] ? 'Sim' : 'Não';

                            echo "<tr>";
                            echo "<td>{$veiculo['id_veiculo']}</td>";
                            echo "<td>{$veiculo['nome']}</td>";
                            echo "<td>{$veiculo['marca']}</td>";
                            echo "<td>{$veiculo['ano']}</td>";
                            echo "<td>{$veiculo['placa_veiculo']}</td>";
                            echo "<td>{$veiculo['capacidade_veiculo']}</td>";
                            echo "<td>$vidroEletrico</td>";
                            echo "<td>$airbag</td>";
                            echo "<td>{$veiculo['capacidaportamala_veiculo']}</td>";
                            echo "<td>$arCondicionado</td>";
                            echo "<td>$automatico</td>";
                            echo "<td>{$veiculo['km_veiculo']}</td>";
                            echo "<td>
                                    <a href='editar_veiculo.php?id_veiculo={$veiculo['id_veiculo']}' class='btn btn-warning btn-sm'>Editar</a>
                                  </td>";
                            echo "</tr>";
                        }
                    }

                    // Exibir veículos disponíveis
                    if (!empty($veiculosDisponiveis)) {
                        echo "<tr class='table-success'><td colspan='14'><h5>Veículos Disponíveis</h5></td></tr>";
                        exibirTabelaVeiculos($veiculosDisponiveis, 'Disponível');
                    } else {
                        echo "<tr><td colspan='14'>Nenhum veículo disponível encontrado.</td></tr>";
                    }

                    // Exibir veículos indisponíveis
                    if (!empty($veiculosIndisponiveis)) {
                        echo "<tr class='table-danger'><td colspan='14'><h5>Veículos Indisponíveis</h5></td></tr>";
                        exibirTabelaVeiculos($veiculosIndisponiveis, 'Indisponível');
                    } else {
                        echo "<tr><td colspan='14'>Nenhum veículo indisponível encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>