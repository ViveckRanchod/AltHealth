<?php
include ('configs.php');


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
           ['CLIENT', 'FREQUENCY'],
           <?php
		  $sql = "SELECT concat(tblclientinfo.C_name,'',tblclientinfo.C_surname) AS CLIENT, 
                  COUNT(tblclientinfo.Client_ID) As FREQUENCY FROM tblinv_info INNER JOIN tblclientinfo ON tblinv_info.Client_ID=tblclientinfo.Client_ID 
                  WHERE (SELECT SUBSTRING(Inv_paid_date,1,4)>=2018) AND (SELECT SUBSTRING(Inv_paid_date,1,4)>=19) GROUP BY tblclientinfo.Client_ID ORDER BY 
                  COUNT(tblclientinfo.Client_ID)DESC LIMIT 10";
          $fire = mysqli_query($con,$sql);
		  while ($result = mysqli_fetch_assoc($fire)){
			  echo "['".$result['CLIENT']."',".$result['FREQUENCY']."],";
		  }
		  ?>
        ]);

        var options = {
          title: 'report - Top 10 clients for 2018 and 2019'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 600px; height: 300px;"></div>
  </body>
</html>