<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = $_POST['produto_id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade_estoque = $_POST['quantidade_estoque'];


    // Verifica se uma nova imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadDiretorio = "./imagens/";  // Substitua pelo caminho correto
        $extensao = "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $novo_nome = time() . md5(uniqid()) . time();
        $arquivo_servidor = $uploadDiretorio . $novo_nome . $extensao;

        // Move a nova imagem para o diretório
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo_servidor)) {
            // Atualiza o caminho da imagem no banco de dados
            $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', quantidade_estoque='$quantidade_estoque', imagem='$arquivo_servidor' WHERE produto_id='$produto_id'";
        } else {
            echo "Erro ao mover o arquivo de upload.";
            exit;  // Encerra o script se ocorrer um erro no upload
        }
    } else {
        // Se nenhuma nova imagem foi enviada, atualiza apenas outros campos
        $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', quantidade_estoque='$quantidade_estoque' WHERE produto_id='$produto_id'";
    }

    if (mysqli_query($conexao, $sql)) {
        header('Location: index_vend.php');
        exit();
    } else {
        echo "Erro ao atualizar produto. Tente novamente.";
    }
} else {
    echo "Método inválido de requisição.";
}

mysqli_close($conexao);
?>