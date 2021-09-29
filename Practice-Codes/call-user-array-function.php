<?php
    $func = function ($args1, $args2){
        return $args1*$args2;
    };

    var_dump(call_user_func_array($func, array(2,5)));
    var_dump(call_user_func($func, 2, 5));
?>