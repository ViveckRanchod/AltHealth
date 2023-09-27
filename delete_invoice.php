<?php 
//Connect
include 'configs.php';
if(isset($_GET['delete_id'])){
 $id = $_GET['delete_id'];
 $query = mysqli_query($con, "DELETE FROM tblinv_info WHERE Inv_Num = '$id'");
 if($query){
	 
	  echo "<script>alert('Successfully deleted!')</script>";
  header("location:invoice-view.php");
 }else{
  echo "<script>alert('Sorry delete query not work!')</script>";
 }
}

 ?>