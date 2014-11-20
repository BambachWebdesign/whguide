<?php
$sqlhost="localhost";
$sqluser="";
$sqlpass="";
$db="d016e5e0";
mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
mysql_select_db($db) OR DIE( "Couldn't select database!");
 $start="1";
 $end="7929";


for ($id = $start; $id <= $end; $id++) {
    $query=mysql_query("SELECT system,eve_id,class,size,static1,static2 FROM wh_systems WHERE ID like $id");
    list($system,$eve_id,$class,$static1,$static2) = mysql_fetch_row($query);
    echo $id." || ".$system." || ".$eve_id." || ".$class." || ".$size." || ".$static1." || ".$static2."<br />";
}






?>