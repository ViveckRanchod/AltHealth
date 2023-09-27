
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
<body><main>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                    <div class="page-header">
                        <h2>Create New Invoice Record</h2>
                    </div>
                    <p>Please fill this form and submit to add Invoice record to the database.</p>
                     <form  name="cal" action="invoice_result.php" method="post">
					   <div class="form-group">
                       <input placeholder="Invoice Number" type="text" name="Inv_Number" required> <br/>
					   <?php if(isset($id_error)){?>
					   <p><?php echo $id_error?> </p>
					   <?php }?>
					   
					   <input placeholder="Client ID Number" type="text" name="Client_ID" required><br/>
					   
					   <input placeholder=" "value="<?php echo date("Y-m-d"); ?>" name="Inv_Date"><br/><br/>
					 
					   <input placeholder="Invoice paid" type="text" name="Inv_Paid"><br/>
					   
					   <input placeholder=" "value="<?php echo date("Y-m-d"); ?>" name="Inv_Paid_date"><br/>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="invoice-view.php" class="btn btn-default">Cancel</a>
                    </form>
					
					
					
                </div>
            </div>        
        </div>
    </div>
</body></main>
</html>