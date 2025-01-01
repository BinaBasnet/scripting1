<?php
function calculate_cars_needed($n) {
    return ceil($n / 5); // Round up to ensure everyone is seated
}

$n = 12; // Example with 12 people
echo "For $n people, you will need " . calculate_cars_needed($n) . " car(s) to seat everyone comfortably.";
?>
