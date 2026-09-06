<?php

function calculateSum($a, $b)
{
    $sum = $a + $b;

    if ($a == $b) {
        return $sum * 3;
    }

    return $sum;
}

$num1 = 10;
$num2 = 10;

$result = calculateSum($num1, $num2);

echo "First Number: " . $num1 . "<br>";
echo "Second Number: " . $num2 . "<br>";
echo "Result: " . $result;

?>