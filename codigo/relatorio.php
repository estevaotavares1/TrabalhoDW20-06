<?php
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
        $pdf->AddPage("A4");

        $pdf->SetFont('helvetica', '', 12);

        $pdf->Cell(0, 6, 'Relatório de Pagamento', 0, 1, 'C');
        $pdf->Ln();

        $pdf->Cell(30, 10, 'ID Pagamento', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Valor', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Preco por KM', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Data Pagamento', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Metodo', 1, 0, 'C');
        $pdf->Cell(40, 10, 'ID Aluguel', 1, 1, 'C');
        
        $pdf->Cell(30, 10, $linha['id_pagamento'], 1, 0, 'C');
        $pdf->Cell(30, 10, $linha['valor'], 1, 0, 'C');
        $pdf->Cell(30, 10, $linha['preco_por_km'], 1, 0, 'C');
        $pdf->Cell(50, 10, $linha['data_pagamento'], 1, 0, 'C');
        $pdf->Cell(40, 10, $linha['metodo'], 1, 0, 'C');
        $pdf->Cell(40, 10, $linha['id_aluguel'], 1, 1, 'C');

        $pdf->Output();
    } else {
        echo "Pagamento não encontrado!";
    }

    mysqli_close($conexao);
}
?>
