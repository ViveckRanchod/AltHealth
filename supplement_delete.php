<?php 
//Connect
include 'configs.php';
if(isset($_GET['delete_id'])){
 $id = $_GET['delete_id'];
 $query = mysqli_query($con, "DELETE FROM tblsupplements WHERE Suppliement_id = '$id'");
 if($query){
	 
	  echo "<script>alert('Successfully deleted!')</script>";
  header("location:supplement-full.php");
 }else{
  echo "<script>alert('Sorry delete query not work!')</script>";
 }
}

 ?>