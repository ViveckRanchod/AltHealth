
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
	
	
	
</head>
<body><main>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                    <div class="page-header">
                        <h2>Create New Supplement Record</h2>
                    </div>
                    <p>Please fill this form and submit to add Supplement record to the database.</p>
                     <form  name="cal" action="supplement_result.php" method="post">
					   <div class="form-group">
                       <input placeholder="Supplement ID" type="text" name="supplement_id" required> <br/>
					   <?php if(isset($id_error)){?>
					   <p><?php echo $id_error?> </p>
					   <?php }?>
					   
					   
<select name="supplier_id"  style="width:215px; height:30px; margin-left:-5px;" >
<option>Select Supplier</option>
	<?php
	// display supplier id from supplier table
	include('connection.php');
	$query = $db->prepare("SELECT * FROM tblsupplier");
		$query->bindParam(':Supplier_ID', $res);
		$query->execute();
		for($i=0; $row = $query->fetch(); $i++){
	?>
		<option><?php echo $row['Supplier_ID']; ?></option>
	<?php
	}
	?>
</select><br><br>
					   
					   <input placeholder="Description" type="text" name="description" required><br/>
					   
					   
					   <input id="textcostExcl" placeholder=" Enter Cost Exclude" type="text" name="costExclude" onkeyup="calc()" required><br/>
					   
					   
					   <input id="textVat"  placeholder="Enter Vat" type="text" name="vat" onkeyup="calc()" required><br/>
					   
					   <input id="textcostIxcl" placeholder="Cost Include" type="text" name="costInc" readonly><br/>
					 
					   <input placeholder=" Enter Minimum stock Levels" type="text" name="Min_levels"><br/>
					   
					   <input placeholder="Enter Current stock" type="text" name="Cur_stock_level"><br/>
					    
					   <input placeholder="Enter Napie Code" type="text" name="Nappi_code"><br/>
					   
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="supplement-full.php" class="btn btn-default">Cancel</a>
                    </form>
					
					
					<script>
					// this javascript code help to calculate value of include Cost = Vat * exclude Cost
function calc()
{
var elm = document.forms["cal"];
//validation check if text fields are not empty
if (elm["costExclude"].value != "" && elm["vat"].value != "")
	//perfom calculation..................
{elm["costInc"].value = parseFloat( Math.round(elm["costExclude"].value) * parseFloat(elm["vat"].value)).toFixed(2);}
}
</script>
                </div>
            </div>        
        </div>
    </div>
</body></main>
</html>
 <div class="footer">
  <p>Copyright 2020</p>
</div>