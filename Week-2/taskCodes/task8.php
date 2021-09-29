<?php
    //list the numbers between any two numbers that are divisible by 2 without using conditional statement
    function getEvenNumbers($first_num , $last_num)
    {
        $first_num%2==0 ? $even_numbers=range($first_num,$last_num,2) : $even_numbers=range($first_num+1,$last_num,2);
        return $even_numbers;
    }

    function printArray($array_list)
    {
        foreach ($array_list as $item)
        {
            echo $item."\n";
        }
    }

    $even_numbers = getEvenNumbers(11,55);
    echo "Even numbers between 11 and 55\n";
    printArray($even_numbers);
    $even_numbers2 = getEvenNumbers(50,100);
    echo "Even numbers between 50 and 100\n";
    printArray($even_numbers2);
?>