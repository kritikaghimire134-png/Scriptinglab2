<?php

function findIndex($array, $string)
{
    return array_search($string, $array);
}

$subjects = array("PHP", "Java", "Python", "DBMS");

$search = "Python";

$index = findIndex($subjects, $search);

echo "String: " . $search . "<br>";
echo "Index: " . $index;

?>