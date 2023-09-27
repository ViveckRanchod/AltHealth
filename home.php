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
  .rectangle {
  height: 50px;
  width: 270px;
  background-color: #85c1e9;

}
</style>


<main>

</style>
<img src="img/logo.png" class="img-fluid" alt=""style="width:90px;height:60px;">
<h2 style="background-color: skyblue; margin: 3" >DASHBOARD</h2><br>
<?php // top 10 report
include("Top10.php") ; ?><br>
<h4 style="background-color: skyblue; margin: 3" >DAY TO DAY REPORTS</h4><br>

<div class="rectangle">
<?php    require_once("number-client-report.php"); 
echo '<br>';?>
</div>
<br>
<div class="rectangle">
<?php    require_once("count_birthday.php"); 
echo '<br>';?>
</div>

<br>
<div class="rectangle">
<?php    require_once("count_unpaid_invoice.php"); 
echo '<br>';?>
</div>

<br>
<div class="rectangle">
<?php    require_once("count_Minimum stock levels.php"); 
echo '<br>';?>
</div>





<h4 style="background-color: skyblue; margin: 3" >REPORTS TABLE FORMATS</h4><br>
<?php include("BirthdayReport.php") ; ?>
 <?php include("monthReport.php") ; ?>

  
</main>

<div class="footer">
  <p>Copyright 2020</p>
</div>