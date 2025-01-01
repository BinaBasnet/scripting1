<?php
function find_index($arr, $str) {
    return array_search($str, $arr);
}

$array = ["apple", "banana", "cherry"];
echo "The banana is in index: ";
echo find_index($array, "banana"); // Example
?>
