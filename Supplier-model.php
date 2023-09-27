<?php 
         require_once('connection.php');  
        
    ?>
	<table class="table table-bordered">
	<thead class="alert-info">
	<tr>
	<th>Supplier ID</th>
	<th>Contact Person</th>
	<th>Telephone</th>
	<th>Supplier Email </th>
	<th>Bank</th>
	<th>Bank Code</th>
	<th>Bank Number</th>
	<th>Type Bank Account</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if(isset($_POST['search'])){
		$keyword =$_POST['keyword'];
		$query = $db->prepare("SELECT * FROM tblsupplier WHERE Supplier_ID LIKE '$keyword' or Contact_Person LIKE '$keyword' ");
		$query ->execute();
		while($row = $query->fetch()){
			{?>
	<tr>
	<td><?php echo $row['Supplier_ID'];?></td>
	<td><?php echo $row['Contact_Person'];?></td>
	<td><?php echo $row['Supplier_Tel'];?></td>
	<td><?php echo $row['Supplier_Email'];?></td>
	<td><?php echo $row['Bank'];?></td>
	<td><?php echo $row['Bank_code'];?></td>
	<td><?php echo $row['Supplier_BankNum'];?></td>
	<td><?php echo $row['Supplier_Type_Bank_Account'];?></td>
	</tr>
			<?php
			}
		?>
		</tbody>
		</table>
		<?php
		}
	}
		?>