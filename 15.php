<?php
function get_value_at_index($arr, $index) {
    return isset($arr[$index]) ? $arr[$index] : null;
}

$array = ["apple", "banana", "cherry"];
echo get_value_at_index($array, 1); // Example
?>
