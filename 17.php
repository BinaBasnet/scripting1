<?php
function sum_or_triple($a, $b) {
    if ($a == $b) {
        return 3 * ($a + $b); // Return triple sum if both are equal
    }
    return $a + $b; // Return regular sum otherwise
}

$a = 3;
$b = 3; // Example with two same numbers
echo "The sum of $a and $b is: " . sum_or_triple($a, $b);
?>
