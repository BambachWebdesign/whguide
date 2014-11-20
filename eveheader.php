<?php
require_once('includes/settings.php');

$eve_header=system\header::get_eve_header();




if($eve_header!=0){
    echo "Hallo ".$eve_header['charname']."! Du bist Mitglied bei ".$eve_header['corpname']." und befindest dich zur Zeit im System ".$eve_header['systemname']."!";
} else {
    echo "Bitte die Seite trusten!";    
}
?>