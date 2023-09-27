<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "configs.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM tblsupplier WHERE Supplier_ID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["Contact_Person"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
				
				                       // $Supplier_ID = $row  ["Supplier_ID"] ;
                                        $Contact_Person = $row["Contact_Person"];
                                        $Supplier_Tel = $row["Supplier_Tel"];
                                        $Supplier_Email = $row["Supplier_Email"];
										$Bank = $row["Bank"];
                                        $Bank_code = $row["Bank_code"];
                                        $Supplier_BankNum = $row["Supplier_BankNum"];
										$Supplier_Type_Bank_Account = $row["Supplier_Type_Bank_Account"];
			
               // $name = $row["name"];
                //$address = $row["address"];
                //$salary = $row["salary"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Supplier ID</label>
                        <p class="form-control-static"><?php echo $row["Supplier_ID"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <p class="form-control-static"><?php echo $row["Contact_Person"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Supplier Tel</label>
                        <p class="form-control-static"><?php echo $row["Supplier_Tel"]; ?></p>
                    </div>
					 <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["Supplier_Email"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Bank</label>
                        <p class="form-control-static"><?php echo $row["Bank"]; ?></p>
                    </div>
					 <div class="form-group">
                        <label>Bank code</label>
                        <p class="form-control-static"><?php echo $row["Bank_code"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Supplier BankNum</label>
                        <p class="form-control-static"><?php echo $row["Supplier_BankNum"]; ?></p>
                    </div>
					 <div class="form-group">
                        <label>Type Bank Account</label>
                        <p class="form-control-static"><?php echo $row["Supplier_Type_Bank_Account"]; ?></p>
                    </div>
					
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>