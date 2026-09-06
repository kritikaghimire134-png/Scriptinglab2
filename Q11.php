<?php

function calculateArea($base, $height, $shape)
{
    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    }
    
    elseif ($shape == "parallelogram") {
        return $base * $height;
    }
    
    else {
        return "Invalid shape";
    }
}

$base = 10;
$height = 5;
$shape = "triangle";

$area = calculateArea($base, $height, $shape);

echo "Shape: " . $shape . "<br>";
echo "Base: " . $base . "<br>";
echo "Height: " . $height . "<br>";
echo "Area: " . $area;

?>