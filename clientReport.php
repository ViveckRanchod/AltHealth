<?php 	require_once('connection.php');?>
<?php
// sql command 
 $query ="SELECT Client_ID AS Client, C_Tel_H AS Home, C_Tel_W AS Work, C_Tel_Cell AS Cellphone, C_Email AS Email FROM tblclientinfo 
WHERE (C_Tel_Cell='') AND (C_Email='')";

$statement = $db->prepare($query);
$statement->execute();
$tableFormat=$statement->fetchALL();
$statement->closeCursor();
?>
<fieldset>
<legend><h2>Client Information Query</h2></legend>

<table border="1">
<tr>
<th>Client</th>
<th>Home</th>
<th>Work</th>
<th>Cell</th>
<th>Email</th>
</tr>

<?php foreach($tableFormat as $tblformat) :?>
<tr>
<td><?php echo $tblformat['Client']; ?></td>
<td><?php echo $tblformat['Home']; ?></td>
<td><?php echo $tblformat['Work']; ?></td>
<td><?php echo $tblformat['Cellphone']; ?></td>
<td><?php echo $tblformat['Email']; ?></td>

</tr>
<?php endforeach; ?>
</table>
</fieldset>