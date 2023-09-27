 <?php 
         //require_once("redirect-top-user.php");
         require_once("Supplier-model.php");
	    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>JLK-Althealth</title>
  <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">JLK-Althealth</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div></div>
            </form>
</head>   
</br> </br></br>
<body> <?php //require('navigation.php') ?>
          <div id="wrapper" style="">
          
           <br>
          <div id="action">
        <center>
          
          <form class = "form2" action="supplier-details.php" method="post">
		      </br>
		       <!-- selecting client ID to update comments-->
	         <label>Supplier ID :</label>	 
	         <input type= "text" name="Supplier_ID" value=""/><br><br> 
            <span class="error" style="color: red;font-style: Helvetica; font-size: 0.6em" ><?php if (!empty($msg)) { ?>
                 <?php echo htmlspecialchars($msg); ?> <?php } ?></span><br>
           <input type="submit" id="search"class="comments" name="submit"  value="Search" id="view">
	        </br></br>
	      </form>
        
        <?php if (isset($detail)) {
          require_once('supp-details.php');
        } ?>
       <br><br>  
      </div>
   </div> <!-- end of wrapper -->
   
   <script src = "confirm-delete.js"></script>
  
</body>
</html>