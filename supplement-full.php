
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
                        <h2 class="pull-left"> Supplement Details</h2>
                        <a href="supplement_add.php" class="btn btn-success pull-right">Add New Supplement</a>
                    </div>

<form class = "form2" action="" method="post">
		      </br>
			  <form> 
			 
		      <div class="col-md-8">
			  <form action="supplement-full-model.php" method="POST">
			  <div class="form-inline">
			  Enter Supplement ID <br>
			  
			  <!--<button class="button" name="search"> Search </button>-->
			   <input type="text" name="id"  placeholder="Supplement-2"/>
			   <input type="submit" name="search" class="btn btn-primary" value="SEARCH BY ID">
			
			  
			    </div>
		
			 </form>
			  		<br>	 
	<table class="table table-bordered">
	<tr>
	<th>Supplement ID</th>
	<th>Supplier ID</th>
	<th>Description</th>
	<th>Cost excl </th>
	<th>Cost incl</th>
	<th>Min levels</th>
	<th>Currentstock lev</th> 
	<th>Nappi code</th>
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
	
			$query = "SELECT * FROM `tblsupplements` where Suppliement_id='$id'";
			$query_run = mysqli_query($con,$query);
			while($row = mysqli_fetch_array($query_run))
	{
				?>
						
	<tr>			
	<td><?php echo $row['Suppliement_id'];?></td>
	<td><?php echo $row['Supplier_ID'];?></td>
	<td><?php echo $row['Supplement_Description'];?></td>
	<td><?php echo $row['Cost_excl'];?></td>
	<td><?php echo $row['Cost_incl'];?></td>
	<td><?php echo $row['Min_levels'];?></td>
	<td><?php echo $row['Current_stock_levels'];?></td>
	<td><?php echo $row['Nappi_code'];?></td>
	<?php echo "<td><a href=\"supplement_update.php?update_id=$row[Suppliement_id]\"> Edit</a> | <a href=\"supplement_delete.php?delete_id=$row[Suppliement_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
	?>
	</tr>
				
				
				
				
				
			<?php	
				
			}
		}
	?>
	</table>
	
 </main>
 <div class="footer">
  <p>Copyright 2020 </p>
</div>
