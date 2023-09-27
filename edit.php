<?php  include 'menu.inc'; ?>
<?php
// including the database connection file

include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name =$_POST['name'];
	$Supplier_Tel =$_POST['SupplierTel'];
	$email=$_POST['Supplier_Email'];
    $Bank=$_POST['Bank'];	
	$Bank_code=$_POST['Bank_code'];
    $Supplier_BankNum=$_POST['Supplier_BankNum'];
    $Supplier_Type_Bank_Account=$_POST['Supplier_Type_Bank_Account']; 
	
	// checking empty fields
	if(empty($name) || empty($Supplier_Tel) || empty($email)|| empty($Bank)|| empty($Bank_code) || empty($Supplier_BankNum) || empty($Supplier_Type_Bank_Account)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($Supplier_Tel)) {
			echo "<font color='red'>Supplier Tel field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}	

        if(empty($Bank)) {
			echo "<font color='red'>Bank field is empty.</font><br/>";
		}	
if(empty($Bank_code)) {
			echo "<font color='red'>Bank code field is empty.</font><br/>";
		}
		
		if(empty($Supplier_BankNum)) {
			echo "<font color='red'>Supplier BankNum field is empty.</font><br/>";
		}
		
		if(empty($Supplier_Type_Bank_Account)) {
			echo "<font color='red'>Supplier Type Bank Account field is empty.</font><br/>";
		}	

	} else {	
		//updating the table
		$sql = "UPDATE tblsupplier SET Contact_Person=:Contact_Person, Supplier_Tel=:Supplier_Tel, Supplier_Email=:Supplier_Email , Bank=:Bank , Bank_code=:Bank_code, Supplier_BankNum=:Supplier_BankNum, Supplier_Type_Bank_Account=:Supplier_Type_Bank_Account WHERE Supplier_ID=:Supplier_ID";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':Supplier_Tel', $Supplier_Tel);
		$query->bindparam(':Supplier_Email', $email);
		$query->bindparam(':Bank', $Bank);
		$query->bindparam(':Bank_code', $Bank_code);
		$query->bindparam(':Supplier_BankNum', $Supplier_BankNum);
		$query->bindparam(':Supplier_Type_Bank_Account', $Supplier_Type_Bank_Account);
		$query->execute();
		
		
		header("Location: supplier.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tblsupplier WHERE Supplier_ID=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name =         $row['name'];
	$Supplier_Tel = $row['SupplierTel'];
	$email =        $row['Supplier_Email'];
	$Bank =         $row['Bank'];
	$Bank_code =    $row['Bank_code'];
	$Supplier_BankNum = $row['Supplier_BankNum'];
	$Supplier_Type_Bank_Account = $row['Supplier_Type_Bank_Account'];
	//$Bank = $row['Bank'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body><main>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Contact Person</td>
				<td><input type="text" name="name" value="<?php echo $row['Contact_Person'];?>"></td>
			</tr>
			<tr> 
				<td>Supplier Tel</td>
				<td><input type="text" name="SupplierTel" value="<?php echo $Supplier_Tel;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			
			
			<tr> 
				<td>Bank</td>
				<td><input type="text" name="Bank" value="<?php echo $Bank;?>"></td>
			</tr>
			
			<tr> 
				<td>Bankn code</td>
				<td><input type="text" name="Bankncode" value="<?php echo $Bank_code;?>"></td>
			</tr>
			
			<tr> 
				<td>Supplier BankNum</td>
				<td><input type="text" name="SupplierBankNum" value="<?php echo $Supplier_BankNum;?>"></td>
			</tr>
			
			<tr> 
				<td>Supplier TypeBank Account</td>
				<td><input type="text" name="SupplierTypeBankAccount" value="<?php echo $Supplier_Type_Bank_Account;?>"></td>
			</tr>
			
			
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body></main>
</html>
