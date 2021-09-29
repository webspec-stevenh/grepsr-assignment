<?php
    class Example
    {
        private $a;
        private $b;

        function _construct()
        {
            $this->a = 0;
            $this->b = 0;
        }
        function __construct($a, $b)
        {
            $this->a = $a;
            $this->b = $b;
        }
    }

    
?>