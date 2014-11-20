<?php 
require_once('includes/settings.php');
$eve_header=system\header::get_eve_header();
if($eve_header!=0){
 ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      var npc="1";
      var ship="1";
      var pod="1";  
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart(npc,ship,pod) {
        var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('datetime', 'Datum');
            dataTable.addColumn('number', 'NPC Kills');
            dataTable.addColumn('number', 'Ship Kills');
            dataTable.addColumn('number', 'POD Kills');
            dataTable.addRows([<?php
$system_id=$eve_header['systemid']; 
$row_data=system\mysql::get_system_stats($system_id);
foreach($row_data AS $line){echo $line;} 
?>        ]);
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        var options = {
            width: 500, height: 280,
            pointSize: 5,
            hAxis: {
                    format:'H',
                    textStyle:{
                        color:'#FFF'
                    }
            },
            backgroundColor:{fill:'#000',stroke:'#FFF',strokeWidth:'1'},
            title:'Stats for <?php echo $eve_header['systemname'];?>',
            titleTextStyle: {
                color: '#FFF'
                },
            legend: {
                textStyle:{
                    color:'#FFF'
                }
            },
            colors: ['#00BBFF', '#FFFF00', '#FF0000']
        };
        chart.draw(dataTable, options);
      }
    </script>
  </head>
  <body style="background-color: #000000;">
    <div id="chart_div"></div>
  </body>
</html>
<?php } ?>