<?php
function calculate_area($base, $height, $shape) {
    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape == "parallelogram") {
        return $base * $height;
    } elseif ($shape == "circle") {
        return pi() * pow($base, 2); // base is the radius here
    } else {
        return "Invalid shape";
    }
}

$radius = 5; // Example radius for the circle
echo "The area of the circle with radius $radius is: " . calculate_area($radius, 0, "circle"); // Example: Circle with radius 5
?>
