<?php
    //Code to explain 'overriding'
    class Bases
    {
        public function printSomething()
        {
            echo "Function to be overridden \n";
        }
    }

    class Derived extends Bases
    {
        public function printSomething()
        {
            echo "Function overridden \n";
        }
    }

    $base = new Bases();
    $derived = new Derived();

    $base->printSomething();
    $derived->printSomething();
    
?>