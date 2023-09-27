<?php 
//Connect
include 'configs.php';
if(isset($_GET['delete_id'])){
 $id = $_GET['delete_id'];
 $query = mysqli_query($con, "DELETE FROM tblclientinfo WHERE Client_ID = '$id'");
 if($query){
	 
	  echo "<script>alert('Successfully deleted!')</script>";
  header("location:client.php");
 }else{
  echo "<script>alert('Sorry delete query not work!')</script>";
 }
}

 ?>