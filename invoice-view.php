
<?php  include 'menu.inc'; ?>
 <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}
</style>
<main>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"> Invoice Management</h2>
						<br><br><br>
					<?php	
						
include ('configs.php');
?>
<html>
	<head>
		
	</head>
	<body>
		Select invoice:
		<form method='get' action='invoice-db.php'>
			<select name='Client_ID'>
				<?php
					//show invoices list as options
					$query = mysqli_query($con,"select * from tblclientinfo");
					while($invoice = mysqli_fetch_array($query)){
						echo "<option value='".$invoice['Client_ID']."'>".$invoice['Client_ID']."</option>";
					}
				?>
				<br>
			</select>
			<input class="btn btn-success pull-left" type='submit' value='Generate'>
		</form>
                        <a href="invoice_add.php" class="btn btn-success pull-right">Add New Invoice</a>
                    </div>

<form class = "form2" action="" method="post">
		      </br>
			  <form> 
			 
		      <div class="col-md-8">
			  <form action="supplement-full-model.php" method="POST">
			  <div class="form-inline">
			  <b> Enter Invoice Number </b><br>
			  
			  <!--<button class="button" name="search"> Search </button>-->
			   <input type="text" name="id"  placeholder=" INV01586" />
			   <input type="submit" name="search" class="btn btn-primary" value="SEARCH BY INVOICE No">
			
			  
			    </div>
			 </form>
			  		<br>	 
	<table class="table table-bordered">
	<tr>
	<th>Invoice ID</th>
	<th>Client ID</th>
	<th>Invoice Date</th>
	<th>Invoice Paid</th>
	<th>Invoice Paid Date</th>
	
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	//$connection = mysqli_connect("localhost","root","");
	//$db = mysqli_select_db($connection,'althealthdb');
	
	require_once("configs.php");
	if(isset($_POST['search']))
	{
	$id = $_POST['id'];
	
			$query = "SELECT * FROM `tblinv_info` where Inv_Num='$id'";
			$query_run = mysqli_query($con,$query);
			while($row = mysqli_fetch_array($query_run))
	{
				?>
						
	<tr>			
	<td><?php echo $row['Inv_Num'];?></td>
	<td><?php echo $row['Client_ID'];?></td>
	<td><?php echo $row['Inv_Date'];?></td>
	<td><?php echo $row['Inv_Paid'];?></td>
	<td><?php echo $row['Inv_Paid_date'];?></td>
	
	
	<?php echo "<td><a href=\"invoice_update.php?update_id=$row[Inv_Num]\"> Edit</a> | <a href=\"delete_invoice.php?delete_id=$row[Inv_Num]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
	?>
	</tr>	
			<?php	
				
			}
		}
	?>
	</table>
	
 </main>
 <div class="footer">
  <p>Copyright 2020</p>
</div>