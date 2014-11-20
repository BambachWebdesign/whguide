<?php
require_once('includes/settings.php');
system\database::connect_with_whkills_db();
$wh_system="s_30000010";
$current_time=time();
$start_the_chart=$current_time-86400;
$change_the_hour=$start_the_chart;


for($i=1;$i<=24;$i++){
    $query=mysql_query("SELECT ID,timestamp,shipkills,factionkills,podkills from $wh_system WHERE timestamp >= '$change_the_hour' ORDER BY timestamp asc");
    list($id, $timestamp, $shipkills, $factionkills, $podkills) = mysql_fetch_row($query);
    $date = date('Y-m-d',$timestamp);
    $time = date('H:i:s',$timestamp);
    $timedata = $date." @ ".$time;
    $change_the_hour=$change_the_hour+3600;
    if($timestamp>=$change_the_hour){ $id=$shipkills=$factionkills=$podkills=0; }
    if($timestamp==""){$timestamp=$change_the_hour; $id=$shipkills=$factionkills=$podkills=0;}            
    echo $id." |--| ".$timestamp." || ".$change_the_hour." || ".$shipkills." || ".$factionkills." || ".$podkills." || "."<br />";
}
    
    








 ?>