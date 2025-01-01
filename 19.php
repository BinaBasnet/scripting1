<?php
function add_if($str) {
    if (substr($str, 0, 2) == "if") {
        return $str; // Return unchanged if it starts with 'if'
    }
    return "if " . $str; // Add 'if' to the front
}

echo add_if("else") . "\n";   // Output: if else
echo add_if("if else") . "\n"; // Output: if else
?>
