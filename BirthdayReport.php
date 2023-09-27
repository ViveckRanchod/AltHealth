<?php 	require_once('connection.php');?>
<?php
// sql command 
$query = "SELECT Client_id, CONCAT(C_name,' ',C_surname) 'CLIENT'
FROM tblclientinfo
WHERE SUBSTRING(Client_ID,3,2) = EXTRACT(MONTH FROM CURRENT_DATE) AND SUBSTRING(Client_ID,5,2) = EXTRACT(DAY FROM CURRENT_DATE)";

$statement = $db->prepare($query);
$statement->execute();
$tableFormat=$statement->fetchALL();
$statement->closeCursor();
 ?>
 <fieldset>
<legend><h4>Client todays Birthday</h4></legend>
<table class="table table-bordered">
<thead class="alert-info">

<tr>
<th>Client ID</th>
<th>Client</th>
</tr>
</thead>
<?php foreach($tableFormat as $tblformat) :?>
<tr>
<td><?php echo $tblformat['Client_id']; ?></td>
<td><?php echo $tblformat['CLIENT']; ?></td>

</tr>
<?php endforeach; ?>
</table>
</fieldset>