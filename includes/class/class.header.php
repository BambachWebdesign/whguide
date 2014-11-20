<?php
namespace system;

class header
{
    public function get_eve_header(){
        $trusted = $_SERVER['HTTP_EVE_TRUSTED'];
        if($trusted=="Yes"){
            $header['charname'] = $_SERVER['HTTP_EVE_CHARNAME'];
            $header['charid'] = $_SERVER['HTTP_EVE_CHARID'];
            $header['corpname'] = $_SERVER['HTTP_EVE_CORPNAME'];
            $header['corpid'] = $_SERVER['HTTP_EVE_CORPID'];
            $header['systemname'] = $_SERVER['HTTP_EVE_SOLARSYSTEMNAME'];
            $header['systemid'] = $_SERVER['HTTP_EVE_SOLARSYSTEMID'];
            return $header; 
        } else {
            return 0;
        }
    }            
}
?>