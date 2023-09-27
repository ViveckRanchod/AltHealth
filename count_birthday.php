<?php  
//connect to database
$con = mysqli_connect('localhost', 'root', '');
       mysqli_select_db($con, 'althealthdb');
	  
	   
	   //find out the number of results stored in bd
	   
	   $sql ="SELECT Client_id, CONCAT(C_name,' ',C_surname) 'CLIENT'

FROM tblclientinfo
WHERE
SUBSTRING(Client_ID,3,2) = EXTRACT(MONTH FROM CURRENT_DATE)AND SUBSTRING(Client_ID,5,2) = EXTRACT(DAY FROM CURRENT_DATE)";


	   $result = mysqli_query($con,$sql);
	   echo '<p style="color:blue;">'.'Total number of todays birthday(s) :'. $results_number = mysqli_num_rows($result) .' Birthday(s)'.'</p>';
	   
	 
	   

?>