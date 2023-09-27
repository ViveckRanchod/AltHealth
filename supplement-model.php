<?php
// supplemetnt variables

$clientID = htmlspecialchars(filter_input(INPUT_GET,'clientID'));	
  $clientids = htmlspecialchars(filter_input(INPUT_GET,'clientids'));



 $splmentID = htmlspecialchars(filter_input(INPUT_GET,'supplementId'));	
 $inv_num = htmlspecialchars(filter_input(INPUT_GET,'invNum'));
 $supId = htmlspecialchars(filter_input(INPUT_GET,'supId'));
 $price = htmlspecialchars(filter_input(INPUT_GET,'cost'));
 $qty = htmlspecialchars(filter_input(INPUT_GET,'qty'));
 
 // client variables
 
 

 require_once('connection.php');
 $query = "SELECT Client_ID, C_name, C_surname, Address,Code, C_Tel_H
         FROM tblclientinfo";
		$statement = $db->prepare($query);
		$statement->execute();
		$clientInf = $statement->fetchAll();
		$statement->closeCursor();
	
	// retrieve supplement	
       $query = "SELECT *
         FROM tblclientinfo 
		 WHERE Client_ID = :clientID";
		$statement = $db->prepare($query);
		$statement->bindValue(':clientID',$clientID);
		$statement->execute();
		$clientDetail = $statement->fetchAll();
		$statement->closeCursor();
		
 
 
 // callculates the Supplement column
 If (!empty($price) && !empty($qty)){
	 If (is_numeric($price) && is_numeric($qty))
	 $totCost = $price * $qty ;
 }

  // retrievs the supplement id        	
  $query = "SELECT Suppliement_id, Supplement_Description, Cost_incl
         FROM tblsupplements";
		$statement = $db->prepare($query);
		$statement->execute();
		$supplement = $statement->fetchAll();
		$statement->closeCursor();
	
	// retrieve supplement	
       $query = "SELECT *
         FROM tblsupplements 
		 WHERE Suppliement_id = :supplementId";
		$statement = $db->prepare($query);
		$statement->bindValue(':supplementId',$splmentID);
		$statement->execute();
		$suplDetail = $statement->fetchAll();
		$statement->closeCursor();
		
		
		
		
		
		
		
		
		/*function insertInfo($inv_num ){
	    global $db;
	    $query = "INSERT INTO tblinv_info
		(Inv_Num)
		 VALUES 
		 (:Inv_Num)";
	     $statement = $db->prepare($query);
		 $statement->bindValue(':Inv_Num', $inv_num);
		// $statement->bindValue(':Suppliement_id', $supId);
		// $statement->bindValue(':Item_price', $price);
		// $statement->bindValue(':Item_Quantity', $qty);
		 $statement->execute();
		 $statement->closeCursor();
  }*/
			
		
  //insert supplemets to be bought in invoice_items table		
  function insertSupplement($inv_num, $supId, $price, $qty ){
	    /*global $db;
	    $query = "INSERT INTO tblinv_items
		(Inv_Num, Suppliement_id, Item_price, Item_Quantity)
		 VALUES 
		 (:Inv_Num, :Suppliement_id, :Item_price,:Item_Quantity)";
	     $statement = $db->prepare($query);
		 $statement->bindValue(':Inv_Num', $inv_num);
		 $statement->bindValue(':Suppliement_id', $supId);
		 $statement->bindValue(':Item_price', $price);
		 $statement->bindValue(':Item_Quantity', $qty);
		 $statement->execute();
		 $statement->closeCursor();*/
		 
	
		 //require_once('supp-cart-full.php');
		 
  }
 
  // get the number of the stock level
  function checklevel(){
	 global  $db, $stockCheck,  $supId;
	 $query = "SELECT Suppliement_id, Min_levels, Current_stock_levels
	           FROM tblsupplements
                WHERE Suppliement_id = '$supId'" ;
         $statement = $db->query($query);
		 $statement->execute();
		 $stockCheck = $statement->fetchAll();
		 $statement->closeCursor();
        // checks if the is any items in stock, if any then the figure must be retrieved to subtract the quantity
		foreach ($stockCheck as $validStock){
			if ($validStock[2] > 0){
				$availableStock = $validStock[2];
			}			 
       }
	   if (empty($availableStock)){
         $availableStock = 0;
	   }Else{
		  return $availableStock; 
	   }	
  }
 $stock = checklevel(); 
  // update the supplements stock after buying
  function editStock($qty, $stock, $updatedStockNumber){
	  global $db, $qty, $stock;
	  global $supId;
	   $query = "UPDATE tblsupplements
             SET Current_stock_levels = '$updatedStockNumber'
             WHERE Suppliement_id = '$supId'";
		    $statement = $db->prepare($query);
		    $statement->bindValue(':Suppliement_id', $supId);
		    $statement->bindValue(':Current_stock_levels', $updatedStockNumber);
			$statement->execute();
		    $statement->closeCursor();
  }
  // executes when buy button click on the user view
  if (htmlspecialchars(filter_input(INPUT_GET,'submit') == "Buy")){
	  $updatedStockNumber = $stock - $qty ;
	 if ($stock == 0){
		echo '<div id= "wrapper" class="">
                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <strong>Not sent!</strong> No stock for the chosen supplement. </div>';	 
		 require_once('supplement-sells-view.php');
        
	 }else if ($stock < $qty){
		 $qty = $stock;
		 $totCost = $price * $qty ;
		 //insertSupplement($inv_num, $supId, $price, $qty, $totCost );
		echo'<div id= "wrapper" class="">
         <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">X</button>
         <strong>Submitted!</strong> supplement successFully added.
         </div>'; 
		  $updatedStockNumber = 0;
		  editStock($qty, $stock, $updatedStockNumber);
	 }
	 else{		
        insertSupplement($inv_num, $supId, $price, $qty, $totCost );
		echo'<div id= "wrapper" class="">
         <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">X</button>
         <strong>Submitted!</strong> supplement successFully added.
         </div>';
		 ?>

<a href="supp-cart-full.php" class="w3-button w3-black"><button >Back</button>
<?php
		 editStock($qty, $stock, $updatedStockNumber);
	 }
  }	 

?>