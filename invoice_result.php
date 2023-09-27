	
	<?php require_once('connection.php'); ?>
<?php

$invoice = filter_input(INPUT_POST, 'Inv_Number');
$Client_ID = filter_input(INPUT_POST, 'Client_ID');
$Inv_Date = filter_input(INPUT_POST, 'Inv_Date');
$Inv_Paid = filter_input(INPUT_POST, 'Inv_Paid');
$Inv_Paid_date = filter_input(INPUT_POST, 'Inv_Paid_date');


// Validate if the invoice number already existe before to insert in database
   
   if(!isset($id_error)){
//no error
$statement = $db->prepare("SELECT Inv_Num FROM tblinv_info WHERE Inv_Num = :Inv_Number");
$statement->bindParam(':Inv_Number', $invoice);
$statement->execute();

if($statement->rowCount() > 0){
   require_once("invoice_add.php");
  echo '<script>alert("Invoice number Exist already: cannot insert!")</script>';  
} else {
	
	
	// insert  new customer
	
	$query = "INSERT INTO tblinv_info
		(Inv_Num, Client_ID, Inv_Date, Inv_Paid, Inv_Paid_date)
         VALUES   
		 (:Inv_Num, :Client_ID, :Inv_Date, :Inv_Paid, :Inv_Paid_date)";
                  
	     $statement = $db->prepare($query);
		 $statement->bindValue(':Inv_Num', $invoice);
		 $statement->bindValue(':Client_ID', $Client_ID);
		 $statement->bindValue(':Inv_Date', $Inv_Date);
		 $statement->bindValue(':Inv_Paid', $Inv_Paid);
         $statement->bindValue(':Inv_Paid_date', $Inv_Paid_date);
		
		 $statement->execute();
		 $statement->closeCursor();
       
            require_once("invoice_add.php");
           // echo "<center>"."New supplement record created successfully !"."<center>";
            echo '<script>alert("New invoice record created successfully !!")</script>';  			
}
   }