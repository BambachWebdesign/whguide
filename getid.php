<?php
$file=file('https://api.eveonline.com/eve/CharacterID.xml.aspx?names=J124930');
$data=htmlspecialchars($file[5]);
$name = strstr($data, "name");
$name = substr($name, 11, 7);
//echo $name;
$characterID = strstr($data, "characterID");
$characterID = substr($characterID, 18, 8);
echo $characterID;
?>