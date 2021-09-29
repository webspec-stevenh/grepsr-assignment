<?php
    function enclosePerson($name)
    {
        return function ($do_command) use ($name) 
        {
            echo "$name $do_command \n";
        };
    }

    $ano_func = enclosePerson("Clay");

    $ano_func("bring me tea");

// function enclosePerson($name) {
// return function ($doCommand) use ($name) {
// return sprintf('%s, %s', $name, $doCommand);
// };
// }
// // Enclose "Clay" string in closure
// $clay = enclosePerson('Clay');
// // Invoke closure with command
// echo $clay('get me sweet tea!');
// // Outputs --> "Clay, get me sweet tea!"