<html>
<head>

<?php include 'menu.inc';?>
	<title>Add New Supplier</title>
</head>

<body><main>
	<a href="supplier.php">Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Supplier ID</td>
				<td><input type="text" name="Supplier_ID"></td>
			</tr>
			<tr> 
				<td>Contact Person</td>
				<td><input type="text" name="Contact_Person"></td>
			</tr>
			<tr> 
				<td>Supplier Tel</</td>
				<td><input type="text" name="Supplier_Tel"></td>
			</tr>
			
			<tr> 
				<td>Email</td>
				<td><input type="text" name="Supplier_Email"></td>
			</tr>
			
			<tr> 
				<td>Bank</td>
				<td><input type="text" name="Bank"></td>
			</tr>
			
			<tr> 
				<td>Bankn code</td>
				<td><input type="text" name="Bank_code"></td>
			</tr>
			
			
			<tr> 
				<td>Supplier BankNum</td>
				<td><input type="text" name="Supplier_BankNum"></td>
			</tr>
			
			<tr> 
				<td>Type Bank Account</td>
				<td><input type="text" name="Supplier_Type_Bank_Account"></td>
			</tr>
			
			
			
			
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body></main>
</html>

