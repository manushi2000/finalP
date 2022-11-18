<?php

    function back_calculations($date,$days){
        $date = explode('/',$date);
        
        //convert to time
        $lasttime=mktime(0,0,0,$date[0],$date[1],$date[2]);
        
        // next period start
        $next_period=$lasttime + $days*24*3600;
        $next_period=date("F d, Y",$next_period);
        
        //first fertile day
        $firstdaytime=$lasttime + $days*24*3600 - 16*24*3600;
        $firstday=date("F d, Y",$firstdaytime);
        
        //last fertile day
        $lastdaytime=$lasttime + $days*24*3600 - 12*24*3600;
        $lastday=date("F d, Y",$lastdaytime);
        
        //have to adjust due date?
        $diff=$days - 28;
        
        //due date $date + 280 days
        $duedatetime=$lasttime + 280*24*3600 + $diff*24*3600;
        $duedate=date("F d, Y",$duedatetime);

        return [$next_period,$firstday,$lastday,$duedate];
    }
$result = back_calculations('12/10/2022',21);// MM/DD/YYYY

echo $result[0]."--->".$result[1]."--->".$result[2]."--->".$result[3];
?>