<?php

function triangleArea($base, $height)
{
    return 0.5 * $base * $height;
}

$base = 10;
$height = 5;

$area = triangleArea($base, $height);

echo "Base = " . $base . "<br>";
echo "Height = " . $height . "<br>";
echo "Area of Triangle = " . $area;

?>