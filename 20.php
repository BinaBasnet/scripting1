<?php
function repeat_first_two($str) {
    if (strlen($str) < 2) {
        return $str; // Return original string if it's shorter than 2 characters
    }
    $first_two = substr($str, 0, 2);
    return str_repeat($first_two, 4); // Repeat first two characters 4 times
}

echo repeat_first_two("C Sharp") . "\n"; // Output: C C C C
echo repeat_first_two("JS") . "\n";      // Output: JSJSJSJS
echo repeat_first_two("a") . "\n";       // Output: a
?>
