
<?php require_once("connection.php");?>


<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}
</style>
<?php  include 'menu.inc'; ?>

    <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"> Client Details</h2>
                        <a href="client_add.php" class="btn btn-success pull-right">Add New Client</a>
                    </div>

<?php  
/* Attempt to connect to MySQL database */
$con = mysqli_connect('localhost', 'root', '');
       mysqli_select_db($con, 'althealthdb');
	   
	   // define how many results you need per page
	   $result_per_page = 5 ;
	   
	   //find out the number of results stored in bd
	   
	   $sql ="SELECT * FROM tblclientinfo";
	   $result = mysqli_query($con,$sql);
	   $number_of_results = mysqli_num_rows($result);
	   
	  // while ($row = mysqli_fetch_array ($result)){
		//   echo $row['Client_ID'] . '' . $row['C_name'].'<br>';
	   //}
	   
	   // determine number of total pages available
	   $number_of_pages = ceil ($number_of_results/$result_per_page);
	   
	   //determine which page visitor is currently on
	   if (!isset($_GET['page'])){
		   $page = 1;
		   }else{
			   $page =$_GET['page'];
	   }
	   // determine sql limit starting number of page
	   $this_page_fist_result =($page-1)*$result_per_page;

	  $sql = "SELECT * FROM tblclientinfo LIMIT ".$this_page_fist_result. ',' .$result_per_page;
	  $result = mysqli_query($con, $sql);
	 
	//echo '<a href="client_add.php">Add New Client</a><br/><br/> ';
	echo '<table class="table table-bordered">';
	//echo '<thead class="alert-info">';
	//echo '<tr>';
  
	echo'<th>'.'Client ID'.'</th>';
		echo '<th>Name</th>';
		echo'<th>Surname</th>';
		echo'<th>Address</th>';
		echo'<th>Code</th>';
		echo'<th>Home tel</th>';
		echo'<th>Work Tel</th>';
		echo'<th>Tell Cell</th>';
		echo'<th>Email</th>';
		echo'<th>Reference</th>';
		echo'<th>Action</th>';
	   
	    echo'</thead>';
	 

	 while($row = mysqli_fetch_array($result)){
		  
		echo "<tr>";
		echo "<td>".$row['Client_ID']."</td>";
		echo "<td>".$row['C_name']."</td>";
		echo "<td>".$row['C_surname']."</td>";	
		echo "<td>".$row['Address']."</td>";
		echo "<td>".$row['Code']."</td>";
		echo "<td>".$row['C_Tel_H']."</td>";
		echo "<td>".$row['C_Tel_W']."</td>";	
		echo "<td>".$row['C_Tel_Cell']."</td>";
		echo "<td>".$row['C_Email']."</td>";
		echo "<td>".$row['Reference_ID']."</td>";
		echo "<td><a href=\"client_update.php?update_id=$row[Client_ID]\"> Edit</a> | <a href=\"client_delete.php?delete_id=$row[Client_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		

		
		
		
		echo "</tr>";
       
    // echo "<td>". $row['Client_ID'] . '' . $row['C_name']. $row['C_surname'] . '' . $row['Address'].$row['Code'] . '' . $row['C_Tel_H']. $row['C_Tel_W'] . '' . $row['C_Tel_Cell'].'' . $row['C_Email']. $row['Reference_ID'] ."</td>".'<br>';

	  } 
	  echo '</table>';
	 // echo  '<a>'.'Pagination'.'</a>'.'<br>';
	   //starting_limit_number =(page_number-1)*results_per_page
	   
	   //display the link to pages
	   for ($page=1;$page<=$number_of_pages;$page++){
		   
		   echo '<a href="client.php? page = ' . $page.'">' .$page .'</a>';
	   }

?>
</body>
</html>
<div class="footer">
  <p>Copyright 2020</p>
</div>
