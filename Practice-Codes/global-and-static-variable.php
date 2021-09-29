<?php
    $x = 5;

    function show_global()
    {    
        global $x;
        echo ++$x."\n";
    }
    function show_global_with_parameter($x)
    {    
        
        echo ++$x."\n";
    }
    function show_static()
    {
       static $y = 0;
       $y++;
        echo $y."\n";
    }
    show_global();
    show_global();
    show_global_with_parameter($x);
    show_static();
    show_static();
    show_static();
    show_static();
?>