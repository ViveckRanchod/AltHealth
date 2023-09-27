  <?php //include('connection.php') ?> 
  <?php  include 'menu.inc'; ?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"><font color="white">Supplement Details</font></h2>
</head>

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

<body> 

  <main>
  <?php require("supplement-model.php"); ?>
    <!-- client info -->
      <div id="wrapper" style="width:60% ">
      <br>
       
		
	   
	  <!-- Product info --> 
	  <h3>Supplement Items</h3>
	   <div ><b><font color="blue">Select Supplement :&nbsp&nbsp</font><?php echo $inv_num ?> </b></div>
		
	  <form class = "form3" action="supp-cart-full.php" method="get">
         <fieldset>
           <select class="option" name="supplementId" id = "splid"> 
		          <?php foreach( $supplement as $supplements) : ?>
                 <option><?php echo $supplements[0] ?></option>
		          <?php endforeach; ?>
           </select><br><br>
           
           <input type="submit" class="" name="submit"  value="Search" id="createApp"><br>
	      </form>
       </fieldset>
	   
        <form class = "form3" id="formBuy" action="supplement-model.php" method="get">
         <br> 
     
		   <font color="black">Supplement:</font><br>
	  
		   <input type="text" name="supId" readonly  
             value="<?php foreach( $suplDetail as $suplDetails) : ?><?php echo $suplDetails[0]?><?php endforeach; ?>" /><br/>
			 
            <font color="black">Description:</font></label><br>
			<input type="text" name="description" readonly  
             value="<?php foreach( $suplDetail as $suplDetails) : ?><?php echo $suplDetails[2]?><?php endforeach; ?>"/><br/>
			 
          <font color="black">Price:</font></label><br/>
		   <input type="text" name="cost" readonly  
             value="<?php foreach( $suplDetail as $suplDetails) : ?><?php echo $suplDetails[4]?><?php endforeach; ?>"/><br>
              <font color="black">Supplement Quantity:</font></label><br>
			  <input type="text" name="qty" /><br><br>
          
          <input type="submit" class="supp" name="submit"  value="Buy" id="buy">
		 
		 
	            <?php if (!empty($errorMessage)) { ?>
	               <p class="error"><?php echo htmlspecialchars($errorMessage); ?></p>
	            <?php } ?>
	      </form>
		 
		  
       </div>
     </div>
	 </main>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#createclient').change(function() {
                    var opt = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "supplement-model.php",
                       
                        }
                    });
                });
            });
        </script>
	</body>
 </html>
 
 <div class="footer">
  <p>Copyright 2020</p>
</div>