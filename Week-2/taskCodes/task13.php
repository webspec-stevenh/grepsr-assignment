<?php
    //Code to show the number of days of the previous and current month

    $today = strtotime(date('Y-m-d'));
    $one_month_ago = strtotime("-1 months",$today);

    echo "There are ".date('t',$today)." days in ".date('M',$today)."\n";

    echo "There were ".date('t',$one_month_ago)." days in ".date('M',$one_month_ago)."\n";

?>