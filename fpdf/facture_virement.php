<?php
include('../controllers/TransactionContoller.php');

require('fpdf.php');
$pdf= new FPDF( 'p','mm','A5');
$pdf->AddPage();
$pdf->Ln(2);
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,10,'OPERATION DE CAISSE','LTRB',1,'C');
$pdf->Ln(10);

$h=7;
$retrait="    ";
$pdf->SetFont('','','12');
$pdf->Write($h,$retrait."Type d'Operation:                              Virement" ."\n");
$pdf->Write($h,$retrait. "Date:". "                                                 ".gmdate('d-m-y')."\n");
$pdf->Write($h,$retrait. "Heure:". "                                               ".gmdate('H:i:s')."\n");
$pdf->Write($h,$retrait. "Agence:". "                                            ".$_SESSION['agence']."\n");
$pdf->Write($h,$retrait. "Responsable de L'Operation:". "           ".$_SESSION['prenomAuth']." ".$_SESSION['nomAuth']."\n");
$pdf->Write($h,$retrait. "Montant:". "                                           ". $_SESSION['montant']  ."     "."\n");
$pdf->Write($h,$retrait. "Tutilaire du Compte:". "                         ".$_SESSION['prenom']." ".$_SESSION['nom']."\n");
$pdf->Write($h,$retrait. "Destinataire:". "                                     ".$_SESSION['prenom1']." ".$_SESSION['nom1']."\n");
$pdf->Ln(6);
$pdf->SetFont('','BI','8');
$pdf->Cell(100,5,'SIGNATURE DU CLIENT'."                                       "."SIGNATURE DE L'AGENT" ,'TLRB','C');
$pdf->SetFont('','','8');
$pdf->Cell(100,5,' ','LR',1,'C');
$pdf->Cell(100,5,' ','LR',1,'C');
$pdf->Cell(100,5,' ','LR',1,'C');
$pdf->Cell(100,5,' ','LR',1,'C');
$pdf->Cell(100,5,' ','LRB',1,'C');


$pdf->Output('','depot',true);