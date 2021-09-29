<?php
    function sortarray($num_array)
    {
        sort($num_array);
        return $num_array;
    }
    function getmin($sorted_array)
    {
        return $sorted_array[0];
    }
    function getmax($sorted_array)
    {
        return $sorted_array[count($sorted_array)-1];
    }

    $num_array = array(50,10,9,70,13,25,100,75);
    $sorted_array = sortarray($num_array);

    echo "Maximum number in array is ".getmax($sorted_array)."\n";
    echo "Minimum number in array is ".getmin($sorted_array)."\n";
?>