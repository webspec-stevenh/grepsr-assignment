<?php
    //Write a code to display dates in provided format?
	    // input: 'Sep 20 2021' and '09092021'
	    // output: 2021-09-20 and 'Sep-09-2021'

        function format1($date)
        {
            $date = strtotime($date);
            $date = date('Y-m-d',$date);
            return $date;
        }

        function format2($date)
        {
            $date = strtotime($date);
            $date = date('M-d-Y',$date);
            return $date;
        }

        $date1 = 'Sep 20 2021';
        $date1 = format1($date1);
        echo "Formatted date 1 ".$date1."\n";

        $date2 = '09.09.2021';
        $date2 = format2($date2);
        echo "Formatted date 2 ".$date2."\n";

?>