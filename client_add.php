
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add Client record to the database.</p>
                     <form action="client-result.php" method="post">
					   <div class="form-group">
                       <input placeholder="Client ID" type="text" name="cust_id" required> <br/>
					   <?php if(isset($id_error)){?>
					   <p><?php echo $id_error?> </p>
					   <?php }?>
					   
					   <input placeholder="Name" type="text" name="cName" required><br/>
					   <?php if(isset($person_error)){?>
					   <p><?php echo $person_error?> </p>
					   <?php }?>
					   
					   <input placeholder="SurName" type="text" name="lName" required><br/>
					   <?php if(isset($person_error)){?>
					   <p><?php echo $person_error?> </p>
					   <?php }?>
					   
					    <input placeholder="Address" type="text" name="address"><br/>
					   <input placeholder="Code" type="text" name="Code"><br/>
					   
					   <input placeholder="Home tel" type="text" name="telephone"><br/>
					    <?php if(isset($tel_error)){?>
					   <p><?php echo $tel_error?> </p>
					   <?php }?>
					   <input placeholder="Work tel" type="text" name="cellhome"><br/>
					    <?php if(isset($tel_error)){?>
					   <p><?php echo $tel_error?> </p>
					   <?php }?>
					   <input placeholder="Tel cell" type="text" name="cellwork"><br/>
					    <?php if(isset($tel_error)){?>
					   <p><?php echo $tel_error?> </p>
					   <?php }?>
					   <input placeholder="email" type="text" name="email"><br/>
					  
					   <label for="cars">Where did you hear about us?:</label><br><br>

               <select name="referenceId" id="referenceId">
              <option value="1">Website</option>
             <option value="2">Word by mouth</option>
              <option value="3">Friend</option>
                 <option value="4">Facebook</option>
				  <option value="5">Myself</option>
				  <option value="6">Other</option>
                   </select>
					   
					 
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="client.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body></main>
</html>