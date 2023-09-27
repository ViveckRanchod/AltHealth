 <?php  include 'menu.inc'; ?>
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
 <main>
 
 
 
<h3 style="background-color: skyblue; margin: 3" >ALL REPORTS IN TABLES FORMAT </h3><br>


<?php include("Report_Unpaid_Invoices.php") ; ?>
<?php include("BirthdayReport.php") ; ?>
<?php include("Minimum stock levels.php") ; ?>
 <?php include("monthReport.php") ; ?>
  <?php include("clientReport.php") ; ?>
   
<?php include("top_10client_report.php") ; ?>
 
</main>			
<div class="footer">
  <p>Copyright 2020</p>
</div>
