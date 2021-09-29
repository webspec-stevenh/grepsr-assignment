<?php
    //Code to calculate the current age of a person in 'days'

    function calcDays($sdate, $edate)
    {
        $diff = abs($edate-$sdate);
        $days = $diff/(60*60*24);
        return $days;
    }

    $birth_date = '1997-09-24';
    $edate = date('Y-m-d');
    $birth_date = strtotime($birth_date);
    $edate = strtotime($edate);

    $days = calcDays($birth_date, $edate);

    echo "You are $days days old \n";

?>
