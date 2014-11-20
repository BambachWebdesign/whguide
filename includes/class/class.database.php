<?php
namespace system;

class database
{
    public function connect_with_whguide_db(){
        $sqlhost="localhost";
        $sqluser="";
        $sqlpass="";
        $db="";
        mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
        mysql_select_db($db) OR DIE( "Couldn't select database!");
    }
    public function connect_with_whkills_db(){
        $sqlhost="localhost";
        $sqluser="";
        $sqlpass="";
        $db="";
        mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
        mysql_select_db($db) OR DIE( "Couldn't select database!");
    }
}
?>