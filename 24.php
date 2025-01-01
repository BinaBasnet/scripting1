<?php
function convert_last_three_to_uppercase($str) {
    // If the length is less than 3, convert all characters to uppercase
    if (strlen($str) < 3) {
        return strtoupper($str);
    } else {
        // Convert the last 3 characters to uppercase
        $last_three = strtoupper(substr($str, -3));
        return substr($str, 0, strlen($str) - 3) . $last_three;
    }
}

echo convert_last_three_to_uppercase("Nepal") . "<br>";   // Output: NePAL
echo convert_last_three_to_uppercase("Npl") . "<br>";     // Output: NPL
echo convert_last_three_to_uppercase("Bca") . "<br>";     // Output: BCA
echo convert_last_three_to_uppercase("Bachelor") . "<br>";// Output: BacheLOR
?>
