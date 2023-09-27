<!DOCTYPE html>
<html>
<head>
		<title>AltHealth</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<?php 	require_once('connection.php');?>
<?php
 $query ="SELECT
S.Suppliement_id 'SUPPLEMENT',
CONCAT(S.Supplier_ID,' ',C.Contact_Person,' ',C.Supplier_Tel) 'SUPPLIER INFO',
S.Min_levels 'MIN LEVELS',
S.Current_stock_levels 'CURRENT STOCK'
FROM `tblsupplements` S, tblsupplier C
WHERE Current_stock_levels < Min_levels
AND S.Supplier_ID = C.Supplier_ID
ORDER BY S.Supplier_ID;";

$statement = $db->prepare($query);
$statement->execute();
$tableFormat=$statement->fetchALL();
$statement->closeCursor();
?>
<fieldset>
<legend><h2>Minimum Stock Levels</h2></legend>

<table border="1">
<tr>
<th>SUPPLEMENT </th>
<th>SUPPLIER INFO</th>
<th>MIN LEVELS</th>
<th>CURRENT STOCK</th>
</tr>

<?php foreach($tableFormat as $tblformat) :?>
<tr>
<td><?php echo $tblformat['SUPPLEMENT']; ?></td>

<td><?php echo $tblformat['SUPPLIER INFO']; ?></td>
<td><?php echo $tblformat['MIN LEVELS']; ?></td>
<td><?php echo $tblformat['CURRENT STOCK']; ?></td>


</tr>
<?php endforeach; ?>
</table>
</fieldset>