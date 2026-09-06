<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $roll = $_POST['roll'];

    $web = $_POST['web'];
    $dbms = $_POST['dbms'];
    $dsa = $_POST['dsa'];
    $account = $_POST['account'];
    $economics = $_POST['economics'];

    $total = $web + $dbms + $dsa + $account + $economics;

    $percentage = $total / 5;

    if ($web < 40 || $dbms < 40 || $dsa < 40 ||
        $account < 40 || $economics < 40) {

        $result = "Fail";
    } else {
        $result = "Pass";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Mark Sheet</title>
</head>
<body>

<h2>Enter Student Marks</h2>

<form method="post">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Roll No:
    <input type="text" name="roll" required>
    <br><br>

    Web Technology:
    <input type="number" name="web" required>
    <br><br>

    DBMS:
    <input type="number" name="dbms" required>
    <br><br>

    DSA:
    <input type="number" name="dsa" required>
    <br><br>

    Account:
    <input type="number" name="account" required>
    <br><br>

    Economics:
    <input type="number" name="economics" required>
    <br><br>

    <input type="submit" name="submit" value="Generate Mark Sheet">

</form>

<?php if (isset($_POST['submit'])) { ?>

<hr>

<h2>Mark Sheet</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Name</th>
    <td><?php echo $name; ?></td>
</tr>

<tr>
    <th>Roll No</th>
    <td><?php echo $roll; ?></td>
</tr>

<tr>
    <th>Web Technology</th>
    <td><?php echo $web; ?></td>
</tr>

<tr>
    <th>DBMS</th>
    <td><?php echo $dbms; ?></td>
</tr>

<tr>
    <th>DSA</th>
    <td><?php echo $dsa; ?></td>
</tr>

<tr>
    <th>Account</th>
    <td><?php echo $account; ?></td>
</tr>

<tr>
    <th>Economics</th>
    <td><?php echo $economics; ?></td>
</tr>

<tr>
    <th>Total</th>
    <td><?php echo $total; ?></td>
</tr>

<tr>
    <th>Percentage</th>
    <td><?php echo $percentage . "%"; ?></td>
</tr>

<tr>
    <th>Result</th>
    <td><?php echo $result; ?></td>
</tr>

</table>

<?php } ?>

</body>
</html>