<?php 
require_once('includes/settings.php');
system\database::connect_with_whguide_db();
$query=mysql_query("SELECT ID,eve_id from wh_systems ORDER BY ID desc");
while (list($id, $eve_id) = mysql_fetch_row($query)){
    $id_check=$eve_id-30000000;
    if($id!=$id_check){
        echo $id." || ".$eve_id."<br>";
    }
}
?>