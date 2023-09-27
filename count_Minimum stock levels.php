<?php  
//connect to database
$con = mysqli_connect('localhost', 'root', '');
       mysqli_select_db($con, 'althealthdb');
	  
	   
//sql command to locate unpaid invoices
	   
$sql ="SELECT
S.Suppliement_id 'SUPPLEMENT',
CONCAT(S.Supplier_ID,' ',C.Contact_Person,' ',C.Supplier_Tel) 'SUPPLIER INFO',
S.Min_levels 'MIN LEVELS',
S.Current_stock_levels 'CURRENT STOCK'
FROM `tblsupplements` S, tblsupplier C
WHERE Current_stock_levels < Min_levels
AND S.Supplier_ID = C.Supplier_ID
ORDER BY S.Supplier_ID;";
	   $result = mysqli_query($con,$sql);
	   //this funtion is helping us to display number of minimus stock levels
	   echo '<em>'.'Total number of Minimum stock Levels :'.'</em>'. $results_number = mysqli_num_rows($result) .' Stock level(s)';
	   
	 
	   

?>