<?php 
//include database here
include "configs.php";
if(isset($_POST['update'])){
  $Inv_Num          = $_POST['Inv_Number'];
  $Client_ID        = $_POST['Client_ID'];
  $Inv_Date         = $_POST['Inv_Date'];
  $Inv_Paid         = $_POST['Inv_Paid'];
  $Inv_Paid_date    = $_POST['Inv_Paid_date'];
  $id               = $_POST['edit_id'];
 
  //query to insert value in database
  $sql      = mysqli_query($con, "UPDATE tblinv_info SET Inv_Num = '$Inv_Num' ,Client_ID = '$Client_ID', Inv_Date = '$Inv_Date', Inv_Paid = '$Inv_Paid' , Inv_Paid_date = '$Inv_Paid_date' WHERE Inv_Num = '$id'");
  if ($sql) {
	  
	  
	  
	  // require_once("invoice-view.php");
  //echo '<script>alert("Successfully updaded!")</script>';  
	  
	  echo '<script>alert("Successfully updaded!")</script>';
    header("location:invoice-view.php");
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
  <?php $sql = mysqli_query($con, "SELECT * FROM tblinv_info WHERE Inv_Num = '$id' ");
  $row = mysqli_fetch_array($sql);
  $Inv_Num = $row['Inv_Num'];
  $Client_ID = $row['Client_ID']; 
  $Inv_Date = $row['Inv_Date'];
  $Inv_Paid = $row['Inv_Paid'];
  $Inv_Paid_date = $row['Inv_Paid_date'];
 
   ?>
    <form  method="POST" action="invoice_update.php">
        <div class="form-group">
       
		
        <div class="form-group">
          <input type="text" name="Inv_Number" class="form-control" placeholder="Invoice Number..." required="" value="<?php echo $Inv_Num; ?>"><br/>
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="Client_ID" class="form-control" placeholder="..." value="<?php echo $Client_ID; ?>"><br/>
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input placeholder=" "value="<?php echo date("Y-m-d"); ?>" name="Inv_Date" value="<?php echo $Inv_Date; ?>"><br/>
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input placeholder="Invoice paid" type="text" name="Inv_Paid" value="<?php echo $Inv_Paid; ?>"><br/>
		  
		  
        </div><!-- form-group -->
		  <input placeholder=" "value="<?php echo date("Y-m-d"); ?>" name="Inv_Paid_date"value="<?php echo $Inv_Paid_date; ?>"><br/>
		
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
		<br/>
        <div class="form-group">
          <input type="submit" name="update" class="btn btn-info" value="Save">
		  <a href="supplement-full.php" class="btn btn-default">Cancel</a>
        </div><!-- form-group -->
       </form><!-- form -->
<?php endif; ?>

	

  </div><!-- col -->
 </div><!-- row -->
</div><!-- container -->


</html>
</main>
