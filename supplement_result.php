	
	<?php require_once('connection.php'); ?>
<?php

$sup_id = filter_input(INPUT_POST, 'supplement_id');
$supplier_id = filter_input(INPUT_POST, 'supplier_id');
$description = filter_input(INPUT_POST, 'description');
$Cost_excl = filter_input(INPUT_POST, 'costExclude');
$Cost_incl = filter_input(INPUT_POST, 'costInc');
$Min_levels = filter_input(INPUT_POST, 'Min_levels');
$Cur_stock_level = filter_input(INPUT_POST, 'Cur_stock_level');
$Nappi_code = filter_input(INPUT_POST, 'Nappi_code');



// Validate if the supplemet ID alrady existe before to save in database
   
   if(!isset($id_error)){
//no error
$statement = $db->prepare("SELECT Suppliement_id FROM tblsupplements WHERE Suppliement_id = :supplement_id");
$statement->bindParam(':supplement_id', $sup_id);
$statement->execute();

if($statement->rowCount() > 0){
   require_once("supplement_add.php");
  echo '<script>alert("Supplement Exist already: cannot insert!")</script>';  
} else {
	
	
	// insert  new customer
	
	$query = "INSERT INTO tblsupplements
		(Suppliement_id, Supplier_ID, Supplement_Description, Cost_excl, Cost_incl, Min_levels, Current_stock_levels, Nappi_code)
         VALUES   
		 (:Suppliement_id, :Supplier_ID, :Supplement_Description, :Cost_excl, :Cost_incl,:Min_levels, :Current_stock_levels, :Nappi_code)";
                  
	     $statement = $db->prepare($query);
		 $statement->bindValue(':Suppliement_id', $sup_id);
		 $statement->bindValue(':Supplier_ID', $supplier_id);
		 $statement->bindValue(':Supplement_Description', $description);
		 $statement->bindValue(':Cost_excl', $Cost_excl);
         $statement->bindValue(':Cost_incl', $Cost_incl);
		 $statement->bindValue(':Min_levels', $Min_levels);
		 $statement->bindValue(':Current_stock_levels',  $Cur_stock_level);
		 $statement->bindValue(':Nappi_code',  $Nappi_code);
		 $statement->execute();
		 $statement->closeCursor();
       
            require_once("supplement_add.php");
           // echo "<center>"."New supplement record created successfully !"."<center>";
            echo '<script>alert("New supplement record created successfully !!")</script>';  			
}
   }