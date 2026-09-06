<?php

function addFirstThree($str)
{
    $firstThree = substr($str, 0, 3);

    return $firstThree . $str . $firstThree;
}

$str1 = "Python";
$str2 = "JS";
$str3 = "Code";

echo addFirstThree($str1) . "<br>";
echo addFirstThree($str2) . "<br>";
echo addFirstThree($str3);

?>