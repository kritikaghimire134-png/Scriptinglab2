<?php

function lastThreeUpper($str)
{
    $length = strlen($str);

    if ($length < 3) {
        return strtoupper($str);
    }

    $firstPart = substr($str, 0, $length - 3);
    $lastThree = substr($str, -3);

    return $firstPart . strtoupper($lastThree);
}

$str1 = "Nepal";
$str2 = "Npl";
$str3 = "Bca";
$str4 = "Bachelor";

echo lastThreeUpper($str1) . "<br>";
echo lastThreeUpper($str2) . "<br>";
echo lastThreeUpper($str3) . "<br>";
echo lastThreeUpper($str4);

?>