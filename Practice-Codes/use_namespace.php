<?php
// use_namespace.php
use ABC\DEF as NS;
use ABC\DEF\ExampleClass as ExampleClass;

require "example.php";

// instantiate the Tutorial class with namespace alias TC
$obj1 = new NS\ExampleClass();

// instantiate the Tutorial class with class alias Tut
$obj2 = new ExampleClass();

// call the function
echo NS\exampleFunction();

// display the constant
echo NS\EXAMPLE_CONSTANT;
?>