<?php 
//Connect
include 'configs.php';
if(isset($_GET['delete_id'])){
 $id = $_GET['delete_id'];
 $query = mysqli_query($con, "DELETE FROM tblsupplier WHERE Supplier_ID = '$id'");
 if($query){
  header("location:supplier-2.php");
 }else{
  echo "<script>alert('Sorry delete query not work!')</script>";
 }
}

 ?>