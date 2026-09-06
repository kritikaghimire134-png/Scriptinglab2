<?php

function equalLength($str1, $str2)
{
    return strlen($str1) == strlen($str2);
}

$string1 = "Hello";
$string2 = "World";

$result = equalLength($string1, $string2);

var_dump($result);

?>