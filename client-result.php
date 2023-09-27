	
	<?php require_once('connection.php'); ?>
<?php

$customer_id = filter_input(INPUT_POST, 'cust_id');
$c_name = filter_input(INPUT_POST, 'cName');
$last_name = filter_input(INPUT_POST, 'lName');
$address = filter_input(INPUT_POST, 'address');
$Code = filter_input(INPUT_POST, 'Code');
$cellw = filter_input(INPUT_POST, 'cellhome');
$cell = filter_input(INPUT_POST, 'cellwork');
$tel = filter_input(INPUT_POST, 'telephone');
$email = filter_input(INPUT_POST, 'email');
$referenceId = filter_input(INPUT_POST, 'referenceId');

// check existing client id
 if(!isset($id_error)){
//no error
$statement = $db->prepare("SELECT Client_ID FROM tblclientinfo WHERE Client_ID = :cust_id");
$statement->bindParam(':cust_id', $customer_id);
$statement->execute();

if($statement->rowCount() > 0){  
 
   require_once("client_add.php");
  echo '<script>alert("Client Exist already: cannot insert!")</script>';         
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
		   if (!isset($cell) || empty($cell) ){
                  $cell = "";         
           }
         else  if(strlen($tel) != 10){
              
          $cell_error = "Telephone number should be 10 digits";
           }
           else if(is_numeric($tel) != 1){
          $cell_error = "Telelephone number must be numeric";
           }
           else{
               $cell_error = "";
	           $cell = substr_replace($cell, "(", 0, 0);
	           $cell = substr_replace($cell, ")", 4, 0);
	           $cell = substr_replace($cell, "-", 5, 0);
	           $cell = substr_replace($cell, "(", 6, 0);
	           $cell = substr_replace($cell, ")", 10, 0);
	           $cell = substr_replace($cell, "-", 11, 0);
	           $cell = substr_replace($cell, "(", 12, 0);
	           $cell = substr_replace($cell, ")", 17, 0);  
              
           }
	if (!isset($cellw) || empty($cellw) ){
                  $cellw = "";         
           }
         else  if(strlen($cellw) != 10){
              
          $tel_error = "*Telephone number should be 10 digits";
           }
           else if(is_numeric($cellw) != 1){
          $tel_error = "*Telelephone number must be numeric";
           }
           else{
               $cellw_error = "";
	           $cellw = substr_replace($cellw, "(", 0, 0);
	           $cellw = substr_replace($cellw, ")", 4, 0);
	           $cellw = substr_replace($cellw, "-", 5, 0);
	           $cellw = substr_replace($cellw, "(", 6, 0);
	           $cellw = substr_replace($cellw, ")", 10, 0);
	           $cellw = substr_replace($cellw, "-", 11, 0);
	           $cellw = substr_replace($cellw, "(", 12, 0);
	           $cellw = substr_replace($cellw, ")", 17, 0);  
              
           }
	
	
	// insert  new customer
	
	$query = "INSERT INTO tblclientinfo
		(Client_ID, C_name, C_surname, Address, Code, C_Tel_H,
                 C_Tel_W, C_Tel_Cell, C_Email, Reference_ID)
		 VALUES 
		 (:Client_ID, :C_name, :C_surname, :Address, :Code,
                  :C_Tel_H, :C_Tel_W, :C_Tel_Cell, :C_Email, :Reference_ID)";
	         $statement = $db->prepare($query);
		 $statement->bindValue(':Client_ID', $customer_id);
		 $statement->bindValue(':C_name', $c_name);
		 $statement->bindValue(':C_surname', $last_name);
		 $statement->bindValue(':Address', $address);
         $statement->bindValue(':Code', $Code);
		 $statement->bindValue(':C_Tel_H', $cell);
		 $statement->bindValue(':C_Tel_W',  $cellw);
		 $statement->bindValue(':C_Tel_Cell',  $tel);
		 $statement->bindValue(':C_Email', $email);
		 $statement->bindValue(':Reference_ID', $referenceId);
		 $statement->execute();
		 $statement->closeCursor();
       
            require_once("client_add.php");
            echo "<center>"."New client record created successfully !"."<center>";  
 }
 }