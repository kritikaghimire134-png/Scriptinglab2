<?php

$name = "Kritika";          // String
$age = 23;                  // Integer
$height = 5.3;              // Float
$isStudent = true;          // Boolean
$subjects = array("PHP", "Java", "DBMS"); // Array
$value = NULL;              // NULL

// a. Using echo and print
echo "<h3>Using Echo</h3>";
echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Height: " . $height . "<br>";
echo "Student: " . $isStudent . "<br>";

print "<h3>Using Print</h3>";
print "Name: " . $name . "<br>";
print "Age: " . $age . "<br>";

// b. Display array using print_r and var_dump
echo "<h3>Using print_r()</h3>";
echo "<pre>";
print_r($subjects);
echo "</pre>";

echo "<h3>Using var_dump()</h3>";
var_dump($subjects);

// c. Checking data types
echo "<h3>Checking Data Types</h3>";

echo "Is name string? ";
var_dump(is_string($name));

echo "<br>Is age integer? ";
var_dump(is_int($age));

echo "<br>Is height float? ";
var_dump(is_float($height));

echo "<br>Is isStudent boolean? ";
var_dump(is_bool($isStudent));

echo "<br>Is subjects array? ";
var_dump(is_array($subjects));

echo "<br>Is value NULL? ";
var_dump(is_null($value));

?>