<?php
require_once 'testalogin.php';
require_once './tcpdf/tcpdf.php';
require_once 'conexao.php';

if (isset($_GET['id_pagamento'])) {
    $id_pagamento = $_GET['id_pagamento'];

    $sql = "SELECT 
                p.id_pagamento, 
                p.valor, 
                p.preco_por_km, 
                p.data_pagamento, 
                p.metodo, 
                a.id_aluguel
            FROM tb_pagamento p
            JOIN tb_aluguel a ON p.tb_aluguel_id_aluguel = a.id_aluguel
            WHERE p.id_pagamento = $id_pagamento";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_assoc($resultado);

        $pdf = new TCPDF();
        $pdf->setPrintHeader(false);
        $pdf->AddPage();

        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'NOTA FISCAL DE PAGAMENTO', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Informações do Pagamento', 0, 1, 'L');
        $pdf->Ln(4);

        $pdf->SetFont('helvetica', '', 12);
        
        $pdf->Cell(40, 10, 'ID Pagamento', 1, 0, 'L');
        $pdf->Cell(60, 10, $linha['id_pagamento'], 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Valor', 1, 0, 'L');
        $pdf->Cell(60, 10, 'R$ ' . number_format($linha['valor'], 2, ',', '.'), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Preço por KM', 1, 0, 'L');
        $pdf->Cell(60, 10, 'R$ ' . number_format($linha['preco_por_km'], 2, ',', '.'), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Data Pagamento', 1, 0, 'L');
        $pdf->Cell(60, 10, date('d/m/Y', strtotime($linha['data_pagamento'])), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Método', 1, 0, 'L');
        $pdf->Cell(60, 10, $linha['metodo'], 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'ID Aluguel', 1, 0, 'L');
        $pdf->Cell(60, 10, $linha['id_aluguel'], 1, 1, 'L');
        
        $pdf->Output();
    } else {
        echo "Pagamento não encontrado!";
    }

    mysqli_close($conexao);
}
?>
