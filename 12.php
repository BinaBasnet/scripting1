<?php
function string_length($str) {
    if ($str == "") {
        return 0;
    } else {
        return 1 + string_length(substr($str, 1));
    }
}

echo "The length of the string is: " . string_length("Hello"); // Example
?>
