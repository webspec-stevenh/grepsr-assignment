<?php
    //Create a function to floor decimal numbers with any provided precision.
	//ex: convert(2.99999,2), convert(199.99999,4)
    
    function convert($var_dec, $precision)
    {
        return floor($var_dec*(10**$precision))/10**$precision;
    }

    echo 
    "
        <form method='POST' action='/Week2/testCodes/task5.php' >
            <label for='num'>Decimal value</label>
            <input type='number' name='num' step='any'></input><br><br>
            <label for='precision'>Precision value</label>
            <input type='number' name='precision'></input><br><br>
            <input type='submit' name='submit' value='Submit'>
        </form>
    ";
    if(isset($_POST['submit'])) 
    { 
        $num = $_POST['num'];
        $precision = $_POST['precision'];

        $result = convert($num, $precision);

        echo "Decimal value $num <br>";
        echo "Precision $precision <br>";
        echo "Precised value = $result <br>";
    }

?>