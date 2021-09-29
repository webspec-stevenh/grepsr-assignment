<?php
    //Use of the 'switch' statement

    $day = 2;

    if ($day == 1 || $day == 7)
    {
        echo "Weekend \n";

    }
    else if ($day == 2)
    {
        echo "Monday \n";
    }
    else if ($day == 3)
    {
        echo "Tuesday \n";
    }
    else if ($day == 4)
    {
        echo "Wednesday \n";
    }
    else if ($day == 5)
    {
        echo "Thursday \n";
    }
    else if ($day == 6)
    {
        echo "Friday \n";
    }

    switch($day)
    {
        case '1':
        case '7':
            echo 'Weekend \n';
            break;

        case '2':
            echo 'Monday \n';
            break;

        case '3':
            echo 'Tuesday \n';
            break;
        
        case '4':
            echo 'Wednesday \n';
            break;

        case '5':
            echo 'Thursday \n';
            break;

        case '6':
            echo 'Friday \n';
            break;
    }

?>