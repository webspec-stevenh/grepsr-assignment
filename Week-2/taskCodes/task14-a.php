<?php
    //Code to explain 'overloading'

    class Shape
    {
        public $area;
        function __call($name_of_function, $arguments)
        {
            if ($name_of_function=='calcArea')
            {
                switch (count($arguments))
                {
                    case 1:
                        $area_of_circle = 3.14*($arguments[0]**2);
                        $this->area = $area_of_circle;
                        break;
                    case 2:
                        $area_of_rectangle = $arguments[0] * $arguments[1] ;
                        $this->area = $area_of_rectangle;
                        break;
                }
            }
        }
    }

    $circle = new Shape();
    $circle->calcArea(0.4);
    echo "Area of circle with radius 0.4 m is ".$circle->area."\n";

    $rectangle = new Shape();
    $rectangle->calcArea(5,6);
    echo "Area of rectangle with length 5 m and breadth 6 m is ".$rectangle->area."\n";
?>