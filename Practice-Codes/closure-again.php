<?php
    function encloseName($name)
    {
        return function ($do_command) use ($name)
        {
            echo "$name $do_command";
        };
    }

    $clos_func = encloseName('Clay');
    $clos_func('bring me tea');
?>
