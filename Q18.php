<?php

function repeatFirstTwo($str)
{
    if (strlen($str) < 2) {
        return $str;
    }

    $firstTwo = substr($str, 0, 2);

    return $firstTwo . $firstTwo . $firstTwo . $firstTwo;
}

$str1 = "C Sharp";
$str2 = "JS";
$str3 = "a";

echo repeatFirstTwo($str1) . "<br>";
echo repeatFirstTwo($str2) . "<br>";
echo repeatFirstTwo($str3);

?>