<?php
	session_start();
	$kezdonap = $_POST['valaszto'] -1 ;
$ev = date("Y");
$honap = date("M");
//$honapnap = date('D',mktime(0, 0, 0, date($randomhonap), $i));

$nevcellanagysag = 30;

date_default_timezone_set("Europe/Budapest");
include("C:/xampp/htdocs/fpdf.php");
$pdf = new FPDF();  $pdf->AddPage();

    $pdf->AddFont('Arial' , ''   , 'arial.php'  );   
    $pdf->AddFont('Arial' , 'B'  , 'arialb.php' );    
    $pdf->AddFont('Arial' , 'BI' , 'arialbi.php');   
    $pdf->AddFont('Arial' , 'I'  , 'ariali.php' );  
	$pdf->SetAutoPageBreak(0) ;

//$pdf->Line(1, 1, 210, 297);


	$pdf->SetFont('Arial','B', 12);

	$pdf->SetXY(40, 64) ;
	$pdf->Cell($nevcellanagysag ,10	,       "nap"  , 1, 0, 'R' );
	$pdf->Cell(60,10,     "amit akarsz"  , 1, 0, 'R' );   


	$pdf->SetFont('Arial','' , 12);
	$randomhonap = 9;
	for( $i=1; $i<=7; $i++)
	{
		$pdf->SetXY(40, 64+$i*10) ;
		if($i == 6)
			$pdf ->SetTextColor(85 , 107, 47);
		if($i == 7)
			$pdf ->SetTextColor(220 , 20, 60);
		$asd = $i + $kezdonap;
		if($asd <=30)
		{
			$nap = date('D',mktime(0, 0, 0, date($randomhonap), $asd));
			$asd =  $honap . " " . $asd . " " . $nap;
			$pdf->Cell($nevcellanagysag ,10, $asd  , 1, 0, 'R' );
			$pdf->Cell(60,10, " "  , 1, 0, 'R' );   
		}
		//$pdf->Cell(40,10, $hex  , 1, 1, 'R' );
	}



	
	
	
	
	
	
	$mentett = "./naptar_" . date("_YmdHis_") . ".pdf" ; 
    $display =          "naptar_" . date("_YmdHis" )                         . ".pdf" ; 

    $pdf->SetDisplayMode('real');
    $pdf->Output( $mentett , 'F' ); 
    $pdf->Output( $display , 'I' );
?>