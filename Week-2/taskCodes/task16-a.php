<?php 
    interface father{ 
        function message(); 
    } 

    interface mother{ 
        function dayin($my); 
    }

    interface fam extends father,mother{ 
        function cook($name); 
    }

    class test implements fam{ 
        function dayin($my){ 
            Echo "My name is:".$my."\n"; 
        } 
        function message(){ 
            Echo "Interface inheritance, to achieve two abstraction methods\n";
        } 
        function cook($name){ 
            echo "People who often cook often:".$name."\n";
        } 
    }

    $t=new test(); 
    $t->message(); 
    $t-> DAYIN ("Kush");
    $t-> Cook ("Mom");
?> 