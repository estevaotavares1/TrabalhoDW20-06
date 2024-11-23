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
                a.id_aluguel, 
                a.datainicial_aluguel, 
                a.datafinal_aluguel, 
                a.status AS status_aluguel, 
                c.id_cliente, 
                c.nome AS nome_cliente, 
                c.endereco, 
                c.telefone, 
                pf.cpf_pessoa, 
                e.cnpj_empresa
            FROM tb_pagamento p
            JOIN tb_aluguel a ON p.tb_aluguel_id_aluguel = a.id_aluguel
            JOIN tb_cliente c ON a.tb_cliente_id_cliente = c.id_cliente
            LEFT JOIN tb_pessoafisica pf ON c.id_cliente = pf.tb_cliente_id_cliente
            LEFT JOIN tb_empresa e ON c.id_cliente = e.tb_cliente_id_cliente
            WHERE p.id_pagamento = $id_pagamento";
    
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_assoc($resultado);

        // Inicializando o PDF
        $pdf = new TCPDF();
        $pdf->setPrintHeader(false);
        $pdf->AddPage();

        // Cabeçalho
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(90, 10, 'Vrum Vrum Aluguéis', 0, 0, 'L');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Nota Fiscal de Pagamento', 0, 1, 'R');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'Razão Social: Vrum Vrum Aluguéis LTDA', 0, 1, 'L');
        $pdf->Cell(0, 10, 'CNPJ: 12.345.678/0001-90', 0, 1, 'L');
        $pdf->Ln(5);

        // Informações da Nota Fiscal
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(60, 10, 'Número da Nota:', 0, 0, 'L');
        $pdf->Cell(60, 10, 'Série: 001', 0, 1, 'L');
        $pdf->Cell(60, 10, 'Data de Emissão:', 0, 0, 'L');
        $pdf->Cell(60, 10, 'Chave de Acesso:', 0, 1, 'L');
        $pdf->Cell(60, 10, date('d/m/Y'), 0, 0, 'L');
        $pdf->Cell(60, 10, '1234567890123456789012345678901234567890123456789012345678901234', 0, 1, 'L');
        $pdf->Ln(10);

        // Natureza da Operação
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Natureza da Operação: Aluguel de Veículo', 0, 1, 'L');
        $pdf->Ln(5);

        // Dados do Cliente
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Destinatário:', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(40, 10, 'Nome:', 1, 0, 'L');
        $pdf->Cell(150, 10, $linha['nome_cliente'], 1, 1, 'L');

        $pdf->Cell(40, 10, 'Endereço:', 1, 0, 'L');
        $pdf->Cell(150, 10, $linha['endereco'], 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Telefone:', 1, 0, 'L');
        $pdf->Cell(150, 10, $linha['telefone'], 1, 1, 'L');
        
        if ($linha['cpf_pessoa']) {
            $pdf->Cell(40, 10, 'CPF:', 1, 0, 'L');
            $pdf->Cell(150, 10, $linha['cpf_pessoa'], 1, 1, 'L');
        } else {
            $pdf->Cell(40, 10, 'CNPJ:', 1, 0, 'L');
            $pdf->Cell(150, 10, $linha['cnpj_empresa'], 1, 1, 'L');
        }
        $pdf->Ln(10);

        // Dados do Aluguel
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Dados do Aluguel:', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        
        $pdf->Cell(40, 10, 'Início:', 1, 0, 'L');
        $pdf->Cell(60, 10, date('d/m/Y', strtotime($linha['datainicial_aluguel'])), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Fim:', 1, 0, 'L');
        $pdf->Cell(60, 10, date('d/m/Y', strtotime($linha['datafinal_aluguel'])), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Status:', 1, 0, 'L');
        $pdf->Cell(60, 10, $linha['status_aluguel'], 1, 1, 'L');
        $pdf->Ln(10);

        // Informações do Pagamento
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Informações do Pagamento:', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        
        $pdf->Cell(40, 10, 'Valor:', 1, 0, 'L');
        $pdf->Cell(60, 10, 'R$ ' . number_format($linha['valor'], 2, ',', '.'), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Preço por KM:', 1, 0, 'L');
        $pdf->Cell(60, 10, 'R$ ' . number_format($linha['preco_por_km'], 2, ',', '.'), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Data Pagamento:', 1, 0, 'L');
        $pdf->Cell(60, 10, date('d/m/Y', strtotime($linha['data_pagamento'])), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Método:', 1, 0, 'L');
        $pdf->Cell(60, 10, $linha['metodo'], 1, 1, 'L');
        $pdf->Ln(10);

        // Rodapé
        $pdf->SetFont('helvetica', 'I', 8);
        $pdf->Cell(0, 10, 'Número do Pedido: 12345', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Observações: Obrigado pela preferência!', 0, 1, 'C');

        // Gerando QR code ou código de barras (opcional)
        // $pdf->write2DBarcode('QRCodeData', 'QRCODE,H', 150, 250, 40, 40);

        // Gerar o PDF
        $pdf->Output();
    } else {
        echo "Pagamento não encontrado!";
    }

    mysqli_close($conexao);
}
?>
