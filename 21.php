<?php
function add_last_char($str) {
    if (strlen($str) > 0) {
        $last_char = substr($str, -1);
        return $last_char . $str . $last_char; // Add last char to front and back
    }
    return $str; // Return original string if empty
}

echo add_last_char("Red") . "<br>";   // Output: dRedd
echo add_last_char("Green") . "<br>"; // Output: nGreenn
echo add_last_char("I") . "<br>";     // Output: III
?>
