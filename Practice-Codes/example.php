<?php
// example.php
namespace ABC\DEF;

// define a class
class ExampleClass {
   public function __construct() {
      echo "Fully qualified class name: ".__CLASS__."\n";
     
   } 
}

// define a function
function exampleFunction() {
    echo "Fully qualified function name: ".__FUNCTION__."\n";
}

// define a constant
const EXAMPLE_CONSTANT = 50;
?>