<?php
require_once('settings.php');

$value = $_POST['value'];
$value_length = strlen ($value);

if($value_length >= 2) {
    $query = mysql_query("SELECT `user_id`,`user_name` FROM `global`.`users` WHERE `global`.`users`.`user_name` LIKE '$search_value%' LIMIT 0,10");
    
    while(list($friend_id,$friend_name) = mysql_fetch_row($query)) {
        echo "<li class='search'>".$friend_name;                        
        echo "</div></li>";
    }
}   
?>