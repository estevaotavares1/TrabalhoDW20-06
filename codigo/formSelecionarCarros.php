<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Carros Disponíveis</h3>

    <form action="gravarEmprestimo.php">
    <?php
        require_once "conexao.php";
        require_once "operacoes.php";
        $datainicial_aluguel = $_GET['datainicial_aluguel'];
        $datafinal_aluguel = $_GET['datafinal_aluguel'];
        $carros = listarVeiculos($conexao);

        foreach ($carros as $carro) {
            // $id = $carro[0];
            echo "<input type='checkbox' name='carros[]'value='$carro[0]'><br> Nome: $carro[1] <br> Marca: $carro[2]<br> Ano: $carro[3]<br> Tipo: $carro[4]<br> Placa: $carro[5]<br> Capacidade: $carro[6]<br> Vidro Eletrico:  $carro[7]<br> Airbag:  $carro[8]<br> Porta malas: $carro[9] L<br> Ar-Condicionado: $carro[10]<br> Automatico:  $carro[11] <br> (KM: $carro[12]) <br><br>";
        }
    ?>
      <input type="hidden" name="datainicial_aluguel" value="<? echo $_GET['datainicial_aluguel']; ?>">
      <input type="hidden" name="datafinal_aluguel" value="<? echo $_GET['datafinal_aluguel'];?>">
     <input type="hidden" name="id_cliente" value="<? echo $_GET['id_cliente']; ?>">
    <input type="hidden" name="id_funcionario" value="<? echo $_GET['id_funcionario'];?>">
   <input type="submit" value="Gravar">
    </form>


</body>
</html>