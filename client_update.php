
<?php 
//include database here
include "configs.php";
if(isset($_POST['update'])){
  $name       = $_POST['personName'];
  $marks      = $_POST['surname'];
  $addr      = $_POST['address'];
  $code       = $_POST['code'];
  $homeTel   = $_POST['tel'];
  $workTel     = $_POST['workTel'];
  $celphone      = $_POST['celphone'];
  $email      = $_POST['email'];
  $ref        = $_POST['ref'];
  $id         = $_POST['edit_id'];
  // update table here
  $sql      = mysqli_query($con, "UPDATE tblclientinfo SET C_name = '$name' ,C_surname = '$marks', Address = '$addr', Code = '$code' , C_Tel_H = '$homeTel', C_Tel_W = '$workTel' , C_Tel_Cell = '$celphone', C_Email = '$email' , Reference_ID = '$ref' WHERE Client_ID = '$id'");
  if ($sql) {
	  
	  echo 'Successfully updated ';
    header("location:client.php");
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
  <?php $sql = mysqli_query($con, "SELECT * FROM tblclientinfo WHERE Client_ID = '$id' ");
  $row = mysqli_fetch_array($sql);
  $name = $row['C_name'];
  $marks = $row['C_surname'];
  $addr = $row['Address'];
  $code = $row['Code'];
  $homeTel = $row['C_Tel_H'];
  $workTel = $row['C_Tel_W'];
  $celphone = $row['C_Tel_Cell'];
  $email = $row['C_Email'];
  $ref = $row['Reference_ID'];
   ?>
    <form method="POST" action="client_update.php">
        <div class="form-group">
          <input type="text" name="personName" class="form-control" placeholder="Enter Name..." required="" value="<?php echo $name; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="surname" class="form-control" placeholder="Enter surname..." required="" value="<?php echo $marks; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="address" class="form-control" placeholder="Enter address..." required="" value="<?php echo $addr; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="code" class="form-control" placeholder="Enter code..."  value="<?php echo $code; ?>">
        </div><!-- form-group -->
		 <div class="form-group">
          <input type="text" name="tel" class="form-control" placeholder="Enter Home tel..." value="<?php echo $homeTel; ?>">
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="workTel" class="form-control" placeholder="Enter work tel..." value="<?php echo $workTel; ?>">
        </div><!-- form-group -->
		 <div class="form-group">
          <input type="text" name="celphone" class="form-control" placeholder="Enter cellphone..." value="<?php echo $celphone; ?>">
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="email" class="form-control" placeholder="Enter email..." value="<?php echo $email; ?>">
        </div><!-- form-group -->
		<div class="form-group">
          <input type="text" name="ref" class="form-control" placeholder="Enter reference..." value="<?php echo $ref; ?>">
        </div><!-- form-group -->
		
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
        <div class="form-group">
          <input type="submit" name="update" class="btn btn-info" value="Save">
        </div><!-- form-group -->
       </form><!-- form -->
<?php endif; ?>



  </div><!-- col -->
 </div><!-- row -->
</div><!-- container -->


</html>
</main>