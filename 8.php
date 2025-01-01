<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $chickens = $_POST['chickens'];
    $cows = $_POST['cows'];
    $pigs = $_POST['pigs'];

    // Calculate total legs
    $total_legs = ($chickens * 2) + ($cows * 4) + ($pigs * 4);
    echo "Total number of legs: $total_legs";
}
?>
<form method="post">
    Chickens: <input type="number" name="chickens"><br>
    Cows: <input type="number" name="cows"><br>
    Pigs: <input type="number" name="pigs"><br>
    <input type="submit" value="Calculate Legs">
</form>
