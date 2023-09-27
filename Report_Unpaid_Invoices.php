<!DOCTYPE html>
<html>
<head>
		<title>AltHealth</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<?php 	require_once('connection.php');?>
<?php
 $query ="SELECT
I.Client_ID 'CLIENT ID',
CONCAT(C.C_name,' ', C.C_surname) 'CLIENT',
I.Inv_Num 'INVOICE NUMBER',
I.Inv_Date 'INVOICE DATE'
FROM
tblinv_info I , tblclientinfo C
WHERE
I.Inv_Date<'2020-01-02' AND I.Inv_Paid<>'Y'
AND
I.Client_ID = C.Client_ID
ORDER BY I.Inv_Date ASC";

$statement = $db->prepare($query);
$statement->execute();
$tableFormat=$statement->fetchALL();
$statement->closeCursor();
?>
<fieldset>
<legend><h2>Unpaid Invoices</h2></legend>

<table border="1">
<tr>
<th>CLIENT ID </th>
<th>CLIENT</th>
<th>INVOICE NUMBER</th>
<th>INVOICE DATE</th>
</tr>

<?php foreach($tableFormat as $tblformat) :?>
<tr>
<td><?php echo $tblformat['CLIENT ID']; ?></td>

<td><?php echo $tblformat['CLIENT']; ?></td>
<td><?php echo $tblformat['INVOICE NUMBER']; ?></td>
<td><?php echo $tblformat['INVOICE DATE']; ?></td>


</tr>
<?php endforeach; ?>
</table>
</fieldset>