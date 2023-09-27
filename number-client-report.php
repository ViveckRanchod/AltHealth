<?php  
//connect to database
$con = mysqli_connect('localhost', 'root', '');
       mysqli_select_db($con, 'althealthdb');
	   
	   // define how many results you need per page
	  // $result_per_page = 10;
	   
	   //find out the number of results stored in bd
	   
	   $sql ="SELECT * FROM tblclientinfo";
	   $result = mysqli_query($con,$sql);
	   echo 'Available clients in the system :'. $results_number = mysqli_num_rows($result) .' Client';
	   
	   // determine number of total pages available
	   

?>