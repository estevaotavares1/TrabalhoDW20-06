<?php
require_once 'conexao.php';

if (isset($_GET['produto_id'])) {
    $produto_id = $_GET['produto_id'];
    $sql = "SELECT * FROM produtos WHERE produto_id = $produto_id";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="estilo/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Produto</h2>

        <form action="atualizar_produto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="produto_id" value="<?= $produto_id ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= $linha['nome'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control"><?= $linha['descricao'] ?></textarea>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="text" name="preco" class="form-control" value="<?= $linha['preco'] ?>" required>
                </div>
                <div class="col-md">
                    <label for="quantidade_estoque" class="form-label">Quantidade em Estoque</label>
                    <input type="text" name="quantidade_estoque" class="form-control" value="<?= $linha['quantidade_estoque'] ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" name="imagem" class="form-control">
            </div>
            <button type="submit" class="btn btn-danger">Atualizar</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto não especificado.";
}

mysqli_close($conexao);
?>