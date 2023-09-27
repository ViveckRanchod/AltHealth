<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['Supplier_ID'];

//deleting the row from table
$sql = "DELETE FROM tblsupplier WHERE Supplier_ID=:Supplier_ID";
$query = $dbConn->prepare($sql);
$query->execute(array(':Supplier_ID' => $id));

//redirecting to the display page (task11.php in our case)
header("Location:supplier.php");
?>
