<?php

function largestNumber($a, $b, $c)
{
    if ($a >= $b && $a >= $c) {
        return $a;
    }
    elseif ($b >= $a && $b >= $c) {
        return $b;
    }
    else {
        return $c;
    }
}

$num1 = 25;
$num2 = 45;
$num3 = 30;

$largest = largestNumber($num1, $num2, $num3);

echo "First Number = " . $num1 . "<br>";
echo "Second Number = " . $num2 . "<br>";
echo "Third Number = " . $num3 . "<br>";
echo "Largest Number = " . $largest;

?>