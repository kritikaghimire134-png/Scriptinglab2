<?php

function addIf($str)
{
    if (substr($str, 0, 2) == "if") {
        return $str;
    }

    return "if" . $str;
}

$str1 = "else";
$str2 = "if else";
$str3 = "if";

echo addIf($str1) . "<br>";
echo addIf($str2) . "<br>";
echo addIf($str3);

?>