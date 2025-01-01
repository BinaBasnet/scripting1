<?php
define("PI", 3.14159);

function calculateCircleArea($radius) {
    return PI * $radius * $radius;
}

// Input radius
$radius = 5;
echo "Area of circle with radius $radius: " . calculateCircleArea($radius);
?>
