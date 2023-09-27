
<?php require_once("connection.php");?>
<?php  include 'menu.inc'; ?>


<?php



if(isset($_POST['insert']))
{
    try {

        // connect to mysql

        $pdoConnect = new PDO("mysql:host=localhost;dbname=althealthdb","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

    // get values form input text and number
    $Suppliement_id = $_POST['Suppliement_id'];
    $Supplier_ID = $_POST['Supplier_ID'];
    $Supplement_Description = $_POST['Supplement_Description'];
	$Cost_excl = $_POST['Cost_excl'];
    $Cost_incl = $_POST['Cost_incl'];
    $Min_levels = $_POST['Min_levels'];
    $Current_stock_levels = $_POST['Current_stock_levels'];
    $Nappi_code = $_POST['Nappi_code'];
    // mysql query to insert data

    $pdoQuery = "INSERT INTO `tblsupplements`(`Suppliement_id`, `Supplier_ID`, `Supplement_Description`, `Cost_excl`, `Cost_incl`, `Min_levels`, `Current_stock_levels`, `Min_levels`, `Nappi_code`) VALUES (:Suppliement_id,:Supplier_ID,:Supplement_Description,:Cost_excl,:Cost_incl,:Min_levels,:Current_stock_levels,:Nappi_code)";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":Suppliement_id"=>$Suppliement_id,":Supplier_ID"=>$Supplier_ID,":Supplement_Description"=>$Supplement_Description ,":Cost_excl"=>$Cost_excl ,":Cost_incl"=>$Cost_incl ,":Min_levels"=>$Min_levels ,":Current_stock_levels"=>$Current_stock_levels,":Nappi_code"=>$Nappi_code));
    
        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}


?>

<!DOCTYPE html>

<html>

    <head>

        <title>althealth</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body><main>
        <form action="add-supplement.php" method="post">

             <input type="text" name="Suppliement_id" required placeholder="Supplement ID"><br><br>
             <input type="text" name="Supplier_ID" required placeholder="supplier ID"><br><br>
			 <input type="text" name="Supplement_Description" required placeholder="description"><br><br>
			 <input type="text" name="Cost_excl" required placeholder="Cost_excl"><br><br>

            <input type="text" name="Cost_incl"  placeholder="Cost_incl ID"><br><br>
			<input type="text" name="Min_levels"  placeholder="Min_levels"><br><br>
            <input type="text" name="Current_stock_levels"  placeholder="Current_stock_levels"><br><br>
			<input type="text" name="Nappi_code"  placeholder="nappi code"><br><br>
           

            <input type="submit" name="insert" value="Insert Data">

        </form>

    </body></main>

</html>
