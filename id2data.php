<?php
$sqlhost="localhost";
$sqluser="";
$sqlpass="";
$db="";
mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
mysql_select_db($db) OR DIE( "Couldn't select database!");

if($_GET['start']){
    $start=$_GET['start'];
} else {
    $start="5401";
}
//$end=$start+99;
//$next=$start+100;
$end="5431";


for ($id = $start; $id <= $end; $id++) {
    $query=mysql_query("SELECT system FROM wh_systems WHERE ID like $id");
    list($system) = mysql_fetch_row($query);
    $url="https://api.eveonline.com/eve/CharacterID.xml.aspx?names=".$system;
    $file=file($url);
    $data=htmlspecialchars($file[5]);
    $characterID = strstr($data, "characterID");
    $characterID = substr($characterID, 18, 8);
    $characterID_snip = substr($characterID, 0, 2);
        
    if($characterID_snip=="30") {
        echo $system." || ".$characterID."<font color=#00FF00> OK! </font><br>";
        mysql_query("UPDATE wh_systems SET eve_id='$characterID' WHERE ID like '$id'");
    } else {
        if(strpos($system,'-')){
            $system=$system."N";
        } else {
            $system=$system."n";    
        }
        $url="https://api.eveonline.com/eve/CharacterID.xml.aspx?names=".$system;
        $file=file($url);
        $data=htmlspecialchars($file[5]);
        $characterID = strstr($data, "characterID");
        $characterID = substr($characterID, 18, 8);
        $characterID_snip = substr($characterID, 0, 2);
        if($characterID_snip=="30") {
            echo $system." || ".$characterID."<font color=#FF7700> FIXED! </font><br>";
            mysql_query("UPDATE wh_systems SET system='$system', eve_id='$characterID' WHERE ID like '$id'");   
        }  else {
            echo $system." || ".$characterID."<font color=#FF0000> BAD ERROR! </font><br>";
        }
        
    }
}
echo "<br /><br />".$start." to ".$end." done! <a href='http://www.bambach-webdesign.de/whguide/id2data.php?start=".$next."'>NEXT</a>";
?>