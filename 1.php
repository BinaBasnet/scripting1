<?php
// Variables with different data types
$integer = 10;
$float = 3.14;
$string = "Hello, PHP!";
$boolean = true;
$array = array("Apple", "Banana", "Cherry");

// a. Print using echo and print
echo "Integer: $integer<br>";
print "Float: $float<br>";
echo "String: $string<br>";
print "Boolean: " . ($boolean ? 'true' : 'false') . "<br>";

// b. Display content of array
echo "Array using print_r:<br>";
print_r($array);
echo "<br>Array using var_dump:<br>";
var_dump($array);
echo "<br>";

// c. Checking data types
echo "Data type of \$integer: " . gettype($integer) . "<br>";
echo "Data type of \$float: " . gettype($float) . "<br>";
echo "Data type of \$string: " . gettype($string) . "<br>";
echo "Data type of \$boolean: " . gettype($boolean) . "<br>";
echo "Data type of \$array: " . gettype($array) . "<br>";
?>
