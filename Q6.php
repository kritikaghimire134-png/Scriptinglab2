<?php

function ageInDays($age)
{
    return $age * 365;
}

$age = 20;

$days = ageInDays($age);

echo "Age in Years = " . $age . "<br>";
echo "Age in Days = " . $days;

?>