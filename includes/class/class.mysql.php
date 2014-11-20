<?php
namespace system;

class mysql
{
    public function get_system_info($system_id){
        
    }
    public function get_gate_info($gate){
        
    }
    public function get_system_stats($system_id){
        database::connect_with_whkills_db();
        $current_time=time();
        $start_the_chart=$current_time-86400;
        $change_the_hour=$start_the_chart;
        $system_table="s_".$system_id;
        for($i=1;$i<=24;$i++){
            $query=mysql_query("SELECT timestamp,shipkills,factionkills,podkills from $system_table WHERE timestamp >= '$change_the_hour' ORDER BY timestamp asc");
            list($timestamp, $shipkills, $factionkills, $podkills) = mysql_fetch_row($query);
            $change_the_hour=$change_the_hour+3600;
            if($timestamp>=$change_the_hour){
                $shipkills=$factionkills=$podkills=0;
            }
            if($timestamp==""){
                $timestamp=$change_the_hour; 
                $shipkills=$factionkills=$podkills=0;                                                       
            }
            $timestamp=$timestamp*1000;
            $data[]="[new Date(".$timestamp."),".$factionkills.",".$shipkills.",".$podkills."],";
        }
        return $data;
    }
}
?>