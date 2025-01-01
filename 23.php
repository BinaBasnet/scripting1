<?php
function convert_last_three_to_upper($str) {
    if (strlen($str) < 3) {
        return strtoupper($str); // Convert the entire string if it's less than 3 characters
    }
    $last_three = strtoupper(substr($str, -3)); // Convert last 3 characters to upper case
    $str_without_last_three = substr($str, 0, strlen($str) - 3);
    return $str_without_last_three . $last_three; // Concatenate the string
}

echo convert_last_three_to_upper("NPL") . "<br/>";    // Output: NPL
echo convert_last_three_to_upper("Nepal") . "<br/>";  // Output: NePAL
echo convert_last_three_to_upper("Bachelor") . "<br/>"; // Output: BacheLOR
?>
