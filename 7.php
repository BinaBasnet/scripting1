<?php
function power($voltage, $current) {
    return $voltage * $current;
}

// Example usage
echo "Power with 220V and 10A is: " . power(220, 10) . " Watts";
?>
