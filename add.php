<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

     if(isset($_POST['Submit'])) {
		 
		
    $id = $_POST['Supplier_ID'];	
	$name = $_POST['Contact_Person'];
	$Supplier_Tel = $_POST['Supplier_Tel'];
	$email = $_POST['Supplier_Email'];
	$Bank = $_POST['Bank'];
	$Bank_code = $_POST['Bank_code'];
	$Supplier_BankNum = $_POST['Supplier_BankNum'];
	$Supplier_Type_Bank_Account = $_POST['Supplier_Type_Bank_Account'];
		
	// checking empty fields for the first 3 field of supplier table
	if(empty($id) || empty($name) || empty($Supplier_Tel)) {	
				
		if(empty($id)) {
			echo "<font color='red'>Supplier ID field is empty.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>Supplier field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(Supplier_ID, Contact_Person, Supplier_Tel, Supplier_Email, Bank, Bank_code,Supplier_BankNum,Supplier_Type_Bank_Account ) VALUES(:Supplier_ID, :Contact_Person, :Supplier_Tel ,:Supplier_Email,:Bank,:Bank_code,:Supplier_BankNum,:Supplier_Type_Bank_Account )";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':Supplier_ID', $id);
		$query->bindparam(':Contact_Person', $name);
		$query->bindparam(':Supplier_Tel', $Supplier_Tel);
		$query->bindparam(':Supplier_Email', $email);
		$query->bindparam(':Bank',$Bank);
		$query->bindparam(':Bank_code', $Bank_code);
		$query->bindparam(':Supplier_BankNum', $Supplier_BankNum);
		$query->bindparam(':Supplier_Type_Bank_Account',$Supplier_Type_Bank_Account);
		$query->execute();
		
		
		//display success message
		echo "<font color='green'>Supplier added successfully.";
		echo "<br/><a href='supplier.php'>View New Supplier</a>";
	}
}
?>
</body>
</html>
