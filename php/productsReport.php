<?php
    require ('FPDF.php');
    require ('mysql.php');

    $query = new MySQL();
    $data = $query->selectAllProduct();


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, "C. de barras", 1, 0, 'C', 0);
    $pdf->Cell(60, 10, "Nombre", 1, 0, 'C', 0);
    $pdf->Cell(30, 10, "Precio", 1, 0, 'C', 0);
    $pdf->Cell(30, 10, "Precio", 1, 0, 'C', 0);
    $pdf->Cell(40, 10, "Cantidad", 1, 1, 'C', 0);
    foreach ($data as $row) {
        $pdf->Cell(30, 10, $row->codBarras, 1, 0, 'C', 0);
        $pdf->Cell(60, 10, $row->nombre, 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $row->precio, 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $row->cantidad, 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $row->idDepartamento, 1, 1, 'C', 0);
    }

    $pdf->Output('D',"productsReport.pdf", true);

?>