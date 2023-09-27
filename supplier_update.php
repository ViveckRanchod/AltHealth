<?php include "configs.php";
if(isset($_POST['update'])){
  $name       = $_POST['personName'];
  $marks      = $_POST['SupplierTel'];
  $email      = $_POST['email'];
  $bank       = $_POST['bank'];
  $bankCode   = $_POST['bankcode'];
    $bank     = $_POST['bank'];
 $bankNum      = $_POST['bankNum'];
 $bankType     = $_POST['bankType'];
  $id         = $_POST['edit_id'];
  $query      = mysqli_query($con, "UPDATE tblsupplier SET Contact_Person = '$name' ,Supplier_Tel = '$marks', Supplier_Email = '$email', Bank = '$bank' , Bank_code = '$bankCode', Supplier_BankNum = '$bankNum' , Supplier_Type_Bank_Account = '$bankType'WHERE Supplier_ID = '$id'");
  if ($query) {
    header("location:supplier-2.php");
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
  <?php $query = mysqli_query($con, "SELECT * FROM tblsupplier WHERE Supplier_ID = '$id' ");
  $r = mysqli_fetch_array($query);
  $name = $r['Contact_Person'];
  $marks = $r['Supplier_Tel'];
  $email = $r['Supplier_Email'];
  $bank = $r['Bank'];
  $bankCode = $r['Bank_code'];
  $bankNum = $r['Supplier_BankNum'];
  $bankType = $r['Supplier_Type_Bank_Account'];
   ?>
    <form method="POST" action="supplier_update.php">
        <div class="form-group">
          <input type="text" name="personName" class="form-control" placeholder="Enter Name..." required="" value="<?php echo $name; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="SupplierTel" class="form-control" placeholder="Enter marks..." required="" value="<?php echo $marks; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="email" class="form-control" placeholder="Enter email..." required="" value="<?php echo $email; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="bank" class="form-control" placeholder="Enter bank..." required="" value="<?php echo $bank; ?>">
        </div><!-- form-group -->
		 <div class="form-group">
          <input type="text" name="bankcode" class="form-control" placeholder="Enter bank..." required="" value="<?php echo $bankCode; ?>">
        </div><!-- form-group -->
		
		 <div class="form-group">
          <input type="text" name="bankNum" class="form-control" placeholder="Enter bank..." required="" value="<?php echo $bankNum; ?>">
        </div><!-- form-group -->
		 <div class="form-group">
          <input type="text" name="bankType" class="form-control" placeholder="Enter bank..." required="" value="<?php echo $bankType; ?>">
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