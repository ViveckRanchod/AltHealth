
<?php 
//include database here
include "configs.php";
if(isset($_POST['update'])){
  $supplierID       = $_POST['supplier_id'];
  $marks            = $_POST['description'];
  $costExclude      = $_POST['costExclude'];
  $costInclude      = $_POST['costInc'];
  $Min_levels       = $_POST['Min_levels'];
  $cur_stock_level  = $_POST['cur_stock_level'];
  $napi             = $_POST['Nappi_code'];
  $id               = $_POST['edit_id'];
 
  //query to insert value in database
  $sql      = mysqli_query($con, "UPDATE tblsupplements SET Supplier_ID = '$supplierID' ,Supplement_Description = '$marks', Cost_excl = '$costExclude', Cost_incl = '$costInclude' , Min_levels = '$Min_levels', Current_stock_levels = '$cur_stock_level' , Nappi_code = '$napi' WHERE Suppliement_id = '$id'");
  if ($sql) {
	  
	  echo "<script>alert('Successfully updaded')</script>";
    header("location:supplement-full.php");
  }else{
    echo "<script>alert('Sorry update query not work')</script>";
  }
}

 ?>
 <?php  include 'menu.inc'; ?>
 <main>


   <?php

  if(isset($_GET['update_id'])): ?>
  <?php $id = $_GET['update_id']; ?>
  <?php $sql = mysqli_query($con, "SELECT * FROM tblsupplements WHERE Suppliement_id = '$id' ");
  $row = mysqli_fetch_array($sql);
  $supplierID = $row['Supplier_ID'];
  $marks = $row['Supplement_Description']; 
  $costExclude = $row['Cost_excl'];
  $costInclude = $row['Cost_incl'];
  $Min_levels = $row['Min_levels'];
  $cur_stock_level = $row['Current_stock_levels'];
  $napi = $row['Nappi_code'];
 
   ?>
    <form name="cal" method="POST" action="supplement_update.php">
        <div class="form-group">
       
		
		<select name="supplier_id"  style="width:215px; height:30px; margin-left:-5px;" >
        <option><?php echo $row['Supplier_ID']; ?></option>
	<?php
	// display supplier id from supplier table
	include('connection.php');
	    $query = $db->prepare("SELECT * FROM tblsupplier");
		$query->bindParam(':Supplier_ID', $res);
		$query->execute();
		for($i=0; $row = $query->fetch(); $i++){
	?>
		<option><?php echo $row['Supplier_ID']; ?></option>
	<?php
	}
	?>
</select><br><br>
        <div class="form-group">
          <input type="text" name="description" class="form-control" placeholder="Enter surname..." required="" value="<?php echo $marks; ?>">
        </div><!-- form-group -->
		

		
		
        <div class="form-group">
          <input id="textcostExcl "type="text" name="costExclude" onkeyup="calc()"  class="form-control" placeholder="Enter address..." required="" value="<?php echo $costExclude; ?>">
        </div><!-- form-group -->
		
		<div class="form-group">
          <input id="textVat" type="text" name="vat" onkeyup="calc()"   class="form-control" placeholder="Enter vat..." required="" value="<?php //echo $vat; ?>">
        </div><!-- form-group -->
		
        <div class="form-group">
          <input id="textcostIxcl" type="text" name="costInc" readonly   value="<?php echo $costInclude; ?>">
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="Min_levels" class="form-control" placeholder="minimum level..." value="<?php echo $Min_levels; ?>">
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="cur_stock_level" class="form-control" placeholder="current stock..." value="<?php echo $cur_stock_level; ?>">
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="Nappi_code" class="form-control" placeholder="napi..." value="<?php echo $napi; ?>">
        </div><!-- form-group -->
		
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
        <div class="form-group">
          <input type="submit" name="update" class="btn btn-info" value="Save">
		  <a href="supplement-full.php" class="btn btn-default">Cancel</a>
        </div><!-- form-group -->
       </form><!-- form -->
<?php endif; ?>

	<script>
					// this javascript code help to calculate value of include Cost = Vat * exclude Cost
function calc()
{
var elm = document.forms["cal"];
//validation check if text fields are not empty
if (elm["costExclude"].value != "" && elm["vat"].value != "")
	//perfom calculation..................
{elm["costInc"].value = parseFloat( Math.round(elm["costExclude"].value) * parseFloat(elm["vat"].value)).toFixed(2);}
}
</script>

  </div><!-- col -->
 </div><!-- row -->
</div><!-- container -->


</html>
</main>
