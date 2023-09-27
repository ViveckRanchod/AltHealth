
<?php 	require_once('connection.php');?>
<?php
$query = "SELECT concat(tblclientinfo.Client_ID,'',tblclientinfo.C_name,'',tblclientinfo.C_surname) AS ClIENT, 
COUNT(tblclientinfo.Client_ID) As FREQUENCY FROM tblinv_info INNER JOIN tblclientinfo ON tblinv_info.Client_ID=tblclientinfo.Client_ID 
WHERE (SELECT SUBSTRING(Inv_paid_date,1,4)>=2018) AND (SELECT SUBSTRING(Inv_paid_date,1,4)>=19) GROUP BY tblclientinfo.Client_ID ORDER BY 
COUNT(tblclientinfo.Client_ID)DESC LIMIT 10";
$statement = $db->prepare($query);
$statement->execute();
$tableFormat=$statement->fetchALL();
$statement->closeCursor();
?>
<fieldset>
<legend><h2>Report Top 10 clients</h2></legend>

<table border="1">
<tr>
<th>CLIENT</th>
<th>FREQUENCY</th>
</tr>

<?php foreach($tableFormat as $tblformat) :?>
<tr>
<td><?php echo $tblformat['ClIENT']; ?></td>
<td><?php echo $tblformat['FREQUENCY']; ?></td>

</tr>
<?php endforeach; ?>
</table>
</fieldset>