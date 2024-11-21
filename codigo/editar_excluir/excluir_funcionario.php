<?php
require_once 'conexao.php';

if (isset($_GET['produto_id'])) {
    $produto_id = $_GET['produto_id'];

    // Verificar se há itens de venda associados a este produto
    $sql_verificar_itens_venda = "SELECT COUNT(*) AS total_itens_venda FROM itens_venda WHERE produto_id = $produto_id";
    $result_verificar_itens_venda = mysqli_query($conexao, $sql_verificar_itens_venda);
    
    if ($result_verificar_itens_venda) {
        $linha_verificar_itens_venda = mysqli_fetch_assoc($result_verificar_itens_venda);
        $total_itens_venda = $linha_verificar_itens_venda['total_itens_venda'];

        if ($total_itens_venda > 0) {
            // Se houver itens de venda associados, exclua primeiro os registros de itens de venda
            $sql_excluir_itens_venda = "DELETE FROM itens_venda WHERE produto_id = $produto_id";
            
            if (mysqli_query($conexao, $sql_excluir_itens_venda)) {
                // Agora que os itens de venda foram excluídos, exclua o produto
                $sql_excluir_produto = "DELETE FROM produtos WHERE produto_id = $produto_id";

                if (mysqli_query($conexao, $sql_excluir_produto)) {
                    echo "Produto excluído com sucesso.";
                } else {
                    echo "Erro ao excluir produto. Tente novamente.";
                }
            } else {
                echo "Erro ao excluir itens de venda associados ao produto. Tente novamente.";
            }
        } else {
            // Se não houver itens de venda associados, exclua apenas o produto
            $sql_excluir_produto = "DELETE FROM produtos WHERE produto_id = $produto_id";

            if (mysqli_query($conexao, $sql_excluir_produto)) {
                echo "Produto excluído com sucesso.";
            } else {
                echo "Erro ao excluir produto. Tente novamente.";
            }
        }
    } else {
        echo "Erro ao verificar itens de venda associados ao produto.";
    }
} else {
    echo "ID do produto não especificado.";
}

mysqli_close($conexao);
?>