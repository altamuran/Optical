<?php
namespace pdf_generator;
namespace App\Http\Controllers;


    function pdf_generator(\App\Ordini $ordine,\App\Clienti $cliente,\App\Lente_sx $lente_sx,\App\Lente_dx $lente_dx)


    {
        
        $pdf = app('FPDF');
        $pdf = app('FPDF');
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(130,10,'');
        $pdf->Cell(40,10,'D.A.I. Optical');
        $pdf->Ln(25);

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(50,10, 'Codice cliente :');
        $pdf->Cell(40,10,$cliente->codice_cliente);
        $pdf->Ln();
        $pdf->Cell(50,10, 'Ragione sociale : ');
        $pdf->Cell(50,10,$cliente->ragione_sociale);
        $pdf->Ln();
         $pdf->Cell(50,10, 'ID Ordine : ');
        $pdf->Cell(50,10,$ordine->n_ordine);
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(180,10, 'Lente_sx',1);
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,10, 'Sfero : ');
        $pdf->Cell(50,10,$lente_sx->sfero_sx);
        $pdf->Ln();
        $pdf->Cell(50,10, 'Cilindro : ');
        $pdf->Cell(50,10,$lente_sx->cilindro_sx);
        $pdf->Ln();
        $pdf->Cell(50,10, 'Asse : ');
        $pdf->Cell(50,10,$lente_sx->asse_sx);
        $pdf->Ln();

        if ($lente_sx->addizione_sx!=0) {
        $pdf->Cell(50,10, 'addizione : ');
        $pdf->Cell(50,10,$lente_sx->addizione_sx);        
        }


        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(180,10, 'Lente_dx',1);
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,10, 'Sfero : ');
        $pdf->Cell(50,10,$lente_dx->sfero_dx);
        $pdf->Ln();
        $pdf->Cell(50,10, 'Cilindro : ');
        $pdf->Cell(50,10,$lente_dx->cilindro_dx);
        $pdf->Ln();
        $pdf->Cell(50,10, 'Asse : ');
        $pdf->Cell(50,10,$lente_dx->asse_dx);
        $pdf->Ln();
         if ($lente_dx->addizione_dx!=0) {
            $pdf->Cell(50,10, 'addizione : ');
            $pdf->Cell(50,10,$lente_dx->addizione_dx);

        }

        

       
        





        $pdf->Output();
        exit;
}