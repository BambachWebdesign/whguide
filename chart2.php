<?php
require_once('includes/settings.php');
system\database::connect_with_whkills_db();
$wh_system="s_".$_GET['system'];
$current_time=time();
$start_time=$current_time-86400;
 ?>

<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="scripts/exporting.js"></script>
<script language="javascript" type="text/javascript" src="scripts/highcharts.js"></script>
<script language="javascript" type="text/javascript" src="scripts/gray.js"></script>
<script language="javascript" type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'area'
            },
            title: {
                text: 'Stats for Jita'
            },
            xAxis: {
                type: 'datetime',
                maxZoom: 24 * 3600000, // fourteen days
                title: {
                    text: null
                }
            },
            yAxis: {
                title: {
                    text: 'Kills'
                }
            },
            tooltip: {
                shared: true
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                type: 'area',
                name: 'NPC Kills',
                pointInterval: 3600000,
                pointStart: Date.UTC(<?php echo date('Y, m, d', $start_time) ?>),
                data: [<?php
$change_the_hour=$start_time;
for($i=1;$i<=24;$i++){
    $query=mysql_query("SELECT timestamp,shipkills,factionkills,podkills from $wh_system WHERE timestamp >= '$change_the_hour' ORDER BY timestamp asc");
    list($timestamp, $shipkills, $factionkills, $podkills) = mysql_fetch_row($query);

    $change_the_hour=$change_the_hour+3600;

    if($timestamp>=$change_the_hour){ $shipkills=$factionkills=$podkills=0; }
    if($timestamp==""){$timestamp=$change_the_hour; $shipkills=$factionkills=$podkills=0;}

    $date = date('Y-m-d',$timestamp);
    $time = date('H:i:s',$timestamp);
    $timedata = $date." @ ".$time;
echo $factionkills.","; }?>]
            }]
        });
    });
</script>
<title>Test</title></head>    
<body style="background-color: #000000;">
<div id="container" style="width: 400px; height: 250px; margin: 0 auto"></div>
</body>
</html>    
    
    