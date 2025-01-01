<?php
function are_lengths_equal($str1, $str2) {
    return strlen($str1) == strlen($str2);
}

echo are_lengths_equal("hello", "world") ? 'true' : 'false'; // Example
?>
