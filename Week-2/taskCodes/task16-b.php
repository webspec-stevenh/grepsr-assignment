<?php 
    // trait ABC
    trait ABC {
        public function sayhello() {
        echo "Hello";
        }
    }
        
    // trait DEF
    trait DEF {
        public function sayfor() {
        echo " There";
        }
    }
        
    class Sample {
        use ABC;
        use DEF;
        public function message() {
            echo "\nhuman";
        } 
    }
        
    $test = new Sample();
    $test->sayhello();
    $test->sayfor();
    $test->message();
?>