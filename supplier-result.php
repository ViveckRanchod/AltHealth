 <?php require_once('connection.php'); ?>
<?php

$supplier_id = filter_input(INPUT_POST, 'supplier_id');
$person = filter_input(INPUT_POST, 'personName');
$tel = filter_input(INPUT_POST, 'telephone');
$email = filter_input(INPUT_POST, 'email');
$bank = filter_input(INPUT_POST, 'bank');
$Code = filter_input(INPUT_POST, 'bankCode');
$banNumber = filter_input(INPUT_POST, 'banNumber');
$typeAccount = filter_input(INPUT_POST, 'typeAccount');


// Validate if the supplier ID alrady existe before to save in database
   
   if(!isset($id_error)){
//no error
$statement = $db->prepare("SELECT Supplier_ID FROM tblsupplier WHERE Supplier_ID = :supplier_id");
$statement->bindParam(':supplier_id', $supplier_id);
$statement->execute();

if($statement->rowCount() > 0){
   require_once("supplier-2.php");
  echo '<script>alert("Supplier Exist already: cannot insert!")</script>';  
} else {
	

// Validate name
   
    if(empty($person)){
		
        $person_error = "Please enter a name.";
		
    } elseif(!filter_var($person, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $person_error = "Please enter a valid name.";
    }
	//validate phone number
    if (!isset($tel) || empty($tel) ){
                  $tel = "";         
           }
         else  if(strlen($tel) != 10){
              
          $tel_error = "*Telephone number should be 10 digits";
           }
           else if(is_numeric($tel) != 1){
          $tel_error = "*Telelephone number must be numeric";
           }
           else{
               $tel_error = "";
	           $tel = substr_replace($tel, "(", 0, 0);
	           $tel = substr_replace($tel, ")", 4, 0);
	           $tel = substr_replace($tel, "-", 5, 0);
	           $tel = substr_replace($tel, "(", 6, 0);
	           $tel = substr_replace($tel, ")", 10, 0);
	           $tel = substr_replace($tel, "-", 11, 0);
	           $tel = substr_replace($tel, "(", 12, 0);
	           $tel = substr_replace($tel, ")", 17, 0);  
              
           }
//else{
	
//}


$query = "INSERT INTO tblsupplier
		(Supplier_ID, Contact_Person, Supplier_Tel, Supplier_Email, Bank, Bank_code,Supplier_BankNum, Supplier_Type_Bank_Account)                               
		 VALUES 
		 (:Supplier_ID, :Contact_Person, :Supplier_Tel, :Supplier_Email, :Bank,
          :Bank_code, :Supplier_BankNum, :Supplier_Type_Bank_Account)";
		  
	     $statement = $db->prepare($query);
		 $statement->bindValue(':Supplier_ID', $supplier_id);
		 $statement->bindValue(':Contact_Person', $person);
		 $statement->bindValue(':Supplier_Tel', $tel);
		 $statement->bindValue(':Supplier_Email', $email);
         $statement->bindValue(':Bank', $bank);
         $statement->bindValue(':Bank_code', $Code);
		 $statement->bindValue(':Supplier_BankNum',  $banNumber);
         $statement->bindValue(':Supplier_Type_Bank_Account',  $typeAccount);
		 $statement->execute();
		 $statement->closeCursor();
   //*/    
     
        include('supplier-add.php'); 
		echo "<center>"."New record created successfully !"."<center>";
		}
   }
?>