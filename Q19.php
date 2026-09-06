<?php

function addLastChar($str)
{
    $lastChar = substr($str, -1);

    return $lastChar . $str . $lastChar;
}

$str1 = "Red";
$str2 = "Green";
$str3 = "1";

echo addLastChar($str1) . "<br>";
echo addLastChar($str2) . "<br>";
echo addLastChar($str3);

?>