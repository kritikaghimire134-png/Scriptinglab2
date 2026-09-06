<?php

function addNumbers($num1, $num2)
{
    return $num1 + $num2;
}

$num1 = 10;
$num2 = 20;

$sum = addNumbers($num1, $num2);

echo "First Number = " . $num1 . "<br>";
echo "Second Number = " . $num2 . "<br>";
echo "Sum = " . $sum;

?>