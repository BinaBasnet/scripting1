<?php
function absolute_difference($n) {
    $difference = abs($n - 51);
    if ($n > 51) {
        return 3 * $difference; // Return triple difference if n > 51
    }
    return $difference;
}

$n = 60; // Example where n > 51
echo "The absolute difference between $n and 51 is: " . absolute_difference($n);
?>
