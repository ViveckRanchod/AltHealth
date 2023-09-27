<?php 	require_once('connection.php');?>
<?php
// slq command 
 $query ="SELECT
count(extract(month from Inv_Date)) 'NUM OF PURCHASES',
monthname(Inv_Date) 'MONTH'
FROM tblinv_info
GROUP BY MONTH
ORDER BY extract(month from Inv_Date)";

$statement = $db->prepare($query);
$statement->execute();
$tableFormat=$statement->fetchALL();
$statement->closeCursor();
?>
<fieldset>
<legend><h4>Purchases statistics  </h4></legend>
<table class="table table-bordered">
<thead class="alert-info">

<tr>
<th>NUMBER OF PURCHASES </th>
<th>MONTH</th>
</tr>
</thead>
<?php foreach($tableFormat as $tblformat) :?>
<tr>
<td><?php echo $tblformat['NUM OF PURCHASES']; ?></td>

<td><?php echo $tblformat['MONTH']; ?></td>


</tr>
<?php endforeach; ?>
</table>
</fieldset>