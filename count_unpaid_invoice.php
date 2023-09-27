<?php  
//connect to database
$con = mysqli_connect('localhost', 'root', '');
       mysqli_select_db($con, 'althealthdb');
	  
	   
//sql command to locate unpaid invoices
	   
$sql ="SELECT
I.Client_ID 'CLIENT ID',
CONCAT(C.C_name,' ', C.C_surname) 'CLIENT',
I.Inv_Num 'INVOICE NUMBER',
I.Inv_Date 'INVOICE DATE'
FROM
tblinv_info I , tblclientinfo C
WHERE
I.Inv_Date<'2020-01-02' AND I.Inv_Paid<>'Y'
AND
I.Client_ID = C.Client_ID
ORDER BY I.Inv_Date ASC";
	   $result = mysqli_query($con,$sql);
	   //this funtion is helping us to display number of unpaid invoice
	   echo 'Total number of Client who owe money) :'. $results_number = mysqli_num_rows($result) .' Unpaid invoive(s)';
	   
	 
	   

?>