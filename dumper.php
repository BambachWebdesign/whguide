<?php
$sqlhost="localhost";
$sqluser="";
$sqlpass="";
$db="";
mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
mysql_select_db($db) OR DIE( "Couldn't select database!");

//if($_GET['start']){
//    $start=$_GET['start'];
//} else {
//    $start="1";
//}       


$start="5386";
$end="5431";    


for ($id = $start; $id <= $end; $id++) {
    $query=mysql_query("SELECT system FROM wh_systems WHERE ID like $id");
    list($system) = mysql_fetch_row($query);
    $system = str_replace(' ', '%20', $system);   
    $file="http://www.wormnav.com/index.php?locus=".$system;
    $html = implode ('', file ($file));
    $html = htmlspecialchars($html);

    $wh_radius = strstr($html, "Radius");
    $wh_radius = substr($wh_radius, 40, 51);
    $wh_radius = strstr($wh_radius, "Au", true);
    echo $id." || ".$system." || ".$wh_radius."<br />";
    mysql_query("UPDATE wh_systems SET size='$wh_radius' WHERE ID like '$id'");
}
//echo "<br /><br />".$start." to ".$end." done! <a href='http://www.bambach-webdesign.de/whguide/dumper.php?start=".$next."'>NEXT</a>";
?>