<?php

function divisibleByFive($number)
{
    return $number % 5 == 0;
}

$number = 25;

$result = divisibleByFive($number);

var_dump($result);

?>