<?php
    //Code to calculate a number of days between any two dates
    function calcDays($sdate, $edate)
    {
        $diff = abs($edate-$sdate);
        $days = $diff/(60*60*24);
        return $days;
    }

    $sdate = '1997-09-24';
    $edate = '2021-01-01';
    $sdate = strtotime($sdate);
    $edate = strtotime($edate);

    $days = calcDays($sdate, $edate);

    echo "Number of days between given dates is $days \n";

?>