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
        
        $carros = listarVeiculos($conexao);

        foreach ($carros as $carro) {
            // $id = $carro[0];
            echo "<input type='checkbox' name='carros[]' value='$carro[0]'> $carro[2] -- $carro[3] -- $carro[4]-- $carro[5]-- $carro[6]-- $carro[7]-- $carro[8]-- $carro[9]-- $carro[10]-- $carro[11]-- $carro[12] (KM: $carro[1]) <br>";
        }
    ?>
     <input type="hidden" name="id_cliente" value="<? echo $_GET['id_cliente']; ?>">
    <input type="hidden" name="id_funcionario" value="<? echo $_GET['id_funcionario'];?>">
   <input type="submit" value="Gravar">
    </form>


</body>
</html>