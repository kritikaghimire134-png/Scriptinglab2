<!DOCTYPE html>
<html>
<body>

<h2>Area of Circle</h2>

<form method="post">
    Enter Radius:
    <input type="number" name="radius" required>
    <input type="submit" name="submit" value="Calculate">
</form>

<?php

define("PI", 3.14159);

if (isset($_POST['submit'])) {

    $radius = $_POST['radius'];

    $area = PI * $radius * $radius;

    echo "Radius = " . $radius . "<br>";
    echo "Area of Circle = " . $area;
}

?>

</body>
</html>