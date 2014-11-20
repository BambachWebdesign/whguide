<?php
require_once('includes/settings.php');
system\database::connect_with_whkills_db();    

    $url="https://api.eveonline.com/map/Kills.xml.aspx";
    $file=file($url);
    
    for($i=5; $i<8000; $i++)
    {
        if(strpos($file[$i],'rowset')){break;}
        $html = htmlspecialchars($file[$i]);
        
        $eve_id = strstr($html, "solarSystemID=&quot;");
        $eve_id = substr($eve_id, 20);
        $eve_id = strstr($eve_id, "&quot;", true);
        $system_table="s_".$eve_id;
        
        $shipkills = strstr($html, "shipKills=&quot;");
        $shipkills = substr($shipkills, 16);
        $shipkills = strstr($shipkills, "&quot;", true);
        
        $factionkills = strstr($html, "factionKills=&quot;");
        $factionkills = substr($factionkills, 19);
        $factionkills = strstr($factionkills, "&quot;", true);
        
        $podkills = strstr($html, "podKills=&quot;");
        $podkills = substr($podkills, 15);
        $podkills = strstr($podkills, "&quot;", true);

        $timestamp=time();
        
        mysql_query("insert INTO $system_table (timestamp,shipkills,factionkills,podkills)
 VALUES('$timestamp','$shipkills','$factionkills','$podkills')") or die("ERROR @ $system_table");
        
        
        //echo $eve_id." || ".$shipkills." || ".$factionkills." || ".$podkills."<br />";
                        
    }
?>