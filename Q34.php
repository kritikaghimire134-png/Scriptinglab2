<?php

if (isset($_POST['calculate'])) {

    $p = $_POST['principal'];
    $r = $_POST['rate'];
    $t = $_POST['time'];

    $si = ($p * $r * $t) / 100;

    $total = $p + $si;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest</title>
</head>
<body>

<h2>Calculate Simple Interest</h2>

<form method="post">

    Principal:
    <input type="number" name="principal" required>
    <br><br>

    Rate:
    <input type="number" name="rate" required>
    <br><br>

    Time:
    <input type="number" name="time" required>
    <br><br>

    <input type="submit"
           name="calculate"
           value="Calculate">

</form>

<?php

if (isset($_POST['calculate'])) {

    echo "<h3>Result</h3>";
    echo "Principal = Rs. $p <br>";
    echo "Rate = $r% <br>";
    echo "Time = $t years <br>";
    echo "Simple Interest = Rs. $si <br>";
    echo "Total Amount = Rs. $total";
}

?>

</body>
</html>