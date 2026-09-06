<?php

function stringLength($str)
{
    if ($str == "") {
        return 0;
    }

    return 1 + stringLength(substr($str, 1));
}

$string = "Hello";

echo "String: " . $string . "<br>";
echo "Length: " . stringLength($string);

?>