<?php

function getValue($array, $index)
{
    return $array[$index];
}

$subjects = array("PHP", "Java", "Python", "DBMS");

$index = 1;

echo "Index: " . $index . "<br>";
echo "Value: " . getValue($subjects, $index);

?>