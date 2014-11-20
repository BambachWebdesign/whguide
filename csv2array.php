<?php
$sqlhost="localhost";
$sqluser="";
$sqlpass="";
$db="";
mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
mysql_select_db($db) OR DIE( "Couldn't select database!");

$gate_array = array("Z060","N110","J244","B274","A239","E545","U210","D845","K346","N766","U574","P060","X877","C247","H900","H296","V753","M267","E175","G024","W237","V911","L477","Q317","Z457");
$gate_array2 = array("O477","Y683","D382","N062","Z647");

    if($_GET['i']){
        $i=$_GET['i'];
    } else {
        $i=0;
    }

    $gate=$gate_array2[$i];
    
    $file="gates/".$gate.".txt";    
    $content = implode ('', file ($file,FILE_IGNORE_NEW_LINES));
    $wh_array = str_getcsv($content, ",");
    foreach($wh_array AS $wh_system){
        echo $wh_system." || ".$gate."<br>";
        mysql_query("UPDATE wh_systems SET static2='$gate' WHERE system like '$wh_system'");                
    }
    $i=$i+1;
echo $gate;  
echo "<br><br><a href=csv2array?i=".$i.">weiter</a>"
?>