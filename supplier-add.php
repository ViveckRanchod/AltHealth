<?php

?>
 <?php  include 'menu.inc'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<main>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header"
					
                        <h2>Create Record for supplier</h2>
                    </div>
                    <p>Please fill this form and submit to add supplier record to the database.</p>
                    <form action="supplier-result.php" method="post">
					
                       <input placeholder="Supplier ID" type="text" name="supplier_id" required> <br/>
					   <?php if(isset($id_error)){?>
					   <p><?php echo $id_error?> </p>
					   <?php }?>
					   
					   <input placeholder="personName" type="text" name="personName" required><br/>
					   <?php if(isset($person_error)){?>
					   <p><?php echo $person_error?> </p>
					   <?php }?>
					   
					   <input placeholder="telephone" type="text" name="telephone"required><br/>
					    <?php if(isset($tel_error)){?>
					   <p><?php echo $tel_error?> </p>
					   <?php }?>
					   <input placeholder="email" type="text" name="email"><br/>
					   <input placeholder="bank" type="text" name="bank"><br/>
					   <input placeholder="bank Code" type="text" name="bankCode"><br/>
					   <input placeholder="banNumber" type="text" name="banNumber"><br/>
					   <input placeholder="typeAccount" type="text" name="typeAccount"><br/><br/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="supplier-2.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body></main>
</html>