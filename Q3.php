<?php

function minutesToSeconds($minutes)
{
    return $minutes * 60;
}

$minutes = 5;

$seconds = minutesToSeconds($minutes);

echo "Minutes = " . $minutes . "<br>";
echo "Seconds = " . $seconds;

?>