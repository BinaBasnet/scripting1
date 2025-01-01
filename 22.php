<?php
function add_first_three($str) {
    $first_three = substr($str, 0, 3); // Take the first 3 characters
    return $first_three . $first_three; // Add first 3 characters to both front and back
}

echo add_first_three("Python") . "<br/>"; // Output: PytPyt
echo add_first_three("JS") . "<br/>";     // Output: JSJS
echo add_first_three("Code") . "<br/>";   // Output: CodCod
?>
