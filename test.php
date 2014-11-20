<?php
    $file="http://www.wormnav.com/index.php?locus=J124930";
    $html = implode ('', file ($file));
    $html = htmlspecialchars($html);
    
    
    $radius = strstr($html, "Radius");    
    $radius = substr($radius, 49, 60);
    $radius = strstr($radius, "Au", true);
    echo $radius;

    
?>