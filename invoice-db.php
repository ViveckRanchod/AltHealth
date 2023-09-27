<?php
require('fpdf17/fpdf.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'althealthdb');

//get invoices data
$query = mysqli_query($con,"select * from tblinv_info
	inner join tblclientinfo using(Client_ID)
	where
	Client_ID = '".$_GET['Client_ID']."'");
$invoice = mysqli_fetch_array($query);



$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'ALTHEALTH',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Boksburg street south center 45]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Johannesburg, South Africa, 2000]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$invoice['Inv_Date'],0,1);//end of line

$pdf->Cell(130	,5,'Phone [+2772 58b35 116]',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$invoice['Inv_Num'],0,1);//end of line

$pdf->Cell(130	,5,'Fax [+2772 58b35 116]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$invoice['Client_ID'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['C_name'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['Code'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['Address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['C_Tel_H'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Quantity',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con,"select * from tblinv_items where Inv_Num = '".$invoice['Inv_Num']."'");


/*$query = mysqli_query($con,"select * from tblinv_items 
	inner join tblsupplements using(Supplement_id)
	where
	Suppliement_id = '".$invoice['Suppliement_id']."'");
//$invoice = mysqli_fetch_array($query);
*/





$qty = 0; //total qty
$amount = 0; //total amount

//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['Suppliement_id'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format($item['Item_Quantity']),1,0);
	$pdf->Cell(34	,5,number_format($item['Item_price']),1,1,'R');//end of line
	//accumulate Item_Quantity and amount
	$qty += $item['Item_Quantity'];
	$amount += $item['Item_price'];
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,'R',1,0);
$pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Quantity',0,0);
$pdf->Cell(4	,5,'Q',1,0);
$pdf->Cell(30	,5,number_format($qty),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'R',1,0);
$pdf->Cell(30	,5,'18%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'R',1,0);
// quantity * item price
$pdf->Cell(30	,5,number_format($amount * $qty),1,1,'R');//end of line





















$pdf->Output();
?>
