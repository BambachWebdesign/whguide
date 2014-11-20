<?php
require_once('includes/settings.php');


system\database::connect_with_whguide_db();
$query=mysql_query("SELECT eve_id FROM wh_systems");
system\database::connect_with_whkills_db();
while (list($eve_id) = mysql_fetch_row($query)){
    $eve_id="s_".$eve_id;
    mysql_query("CREATE TABLE  $eve_id (`id` INT( 11 ) NOT NULL DEFAULT NULL AUTO_INCREMENT PRIMARY KEY ,`timestamp` INT( 20 ) NULL DEFAULT NULL ,`shipkills` INT( 11 ) NULL DEFAULT NULL ,`factionkills` INT( 11 ) NULL DEFAULT NULL ,`podkills` INT( 11 ) NULL DEFAULT NULL) ENGINE = MYISAM ;");
}
?>