<?php

$students = [
    [1, "Rajesh", 25, 96, 86, 57, 64, 81],
    [2, "Hari", 5, 96, 86, 57, 64, 81],
    [3, "Shyam", 9, 54, 75, 57, 90, 81],
    [4, "Rita", 10, 16, 89, 55, 54, 81],
    [5, "Gita", 9, 96, 89, 57, 90, 81],
    [6, "Sita", 24, 96, 89, 57, 24, 81],
    [7, "Sita", 24, 96, 89, 57, 24, 81],
    [8, "Sita", 24, 96, 89, 57, 24, 81]
];

function totalMarks($student)
{
    return $student[3] + $student[4] + $student[5]
         + $student[6] + $student[7];
}

function result($student)
{
    if (
        $student[3] >= 40 &&
        $student[4] >= 40 &&
        $student[5] >= 40 &&
        $student[6] >= 40 &&
        $student[7] >= 40
    ) {
        return "pass";
    }

    return "fail";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Mark Ledger</title>

<style>

table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial;
    font-size: 12px;
}

th, td {
    border: 1px solid white;
    padding: 3px;
    text-align: center;
}

th {
    background-color: white;
    color: black;
    border: 1px solid black;
}

/* First table */
.pass-row {
    background-color: #00ff99;
    color: black;
}

.fail-row {
    background-color: red;
    color: black;
}

/* Second table */
.black-row {
    background-color: #222222;
    color: white;
}

.gray-row {
    background-color: #cccccc;
    color: black;
}

/* Result column */
.pass-result {
    background-color: #00ff99;
    color: black;
}

.fail-result {
    background-color: red;
    color: black;
}

</style>

</head>

<body>

<h3>Mark Ledger</h3>

<table>

<tr>
    <th>S.N</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Web Tech II</th>
    <th>DBMS</th>
    <th>Economics</th>
    <th>DSA</th>
    <th>Account</th>
    <th>Total</th>
    <th>Result</th>
</tr>

<?php

foreach ($students as $student) {

    $total = totalMarks($student);
    $result = result($student);

    if ($result == "pass") {
        $rowClass = "pass-row";
    } else {
        $rowClass = "fail-row";
    }

?>

<tr class="<?php echo $rowClass; ?>">

    <td><?php echo $student[0]; ?></td>
    <td><?php echo $student[1]; ?></td>
    <td><?php echo $student[2]; ?></td>
    <td><?php echo $student[3]; ?></td>
    <td><?php echo $student[4]; ?></td>
    <td><?php echo $student[5]; ?></td>
    <td><?php echo $student[6]; ?></td>
    <td><?php echo $student[7]; ?></td>
    <td><?php echo $total; ?></td>
    <td><?php echo $result; ?></td>

</tr>

<?php } ?>

</table>


<h3>Alternate color</h3>

<table>

<tr>
    <th>S.N</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Web Tech II</th>
    <th>DBMS</th>
    <th>Economics</th>
    <th>DSA</th>
    <th>Account</th>
    <th>Total</th>
    <th>Result</th>
</tr>

<?php

$i = 0;

foreach ($students as $student) {

    $total = totalMarks($student);
    $result = result($student);

    if ($i % 2 == 0) {
        $rowClass = "black-row";
    } else {
        $rowClass = "gray-row";
    }

?>

<tr class="<?php echo $rowClass; ?>">

    <td><?php echo $student[0]; ?></td>
    <td><?php echo $student[1]; ?></td>
    <td><?php echo $student[2]; ?></td>
    <td><?php echo $student[3]; ?></td>
    <td><?php echo $student[4]; ?></td>
    <td><?php echo $student[5]; ?></td>
    <td><?php echo $student[6]; ?></td>
    <td><?php echo $student[7]; ?></td>
    <td><?php echo $total; ?></td>

    <?php if ($result == "pass") { ?>

        <td class="pass-result">pass</td>

    <?php } else { ?>

        <td class="fail-result">fail</td>

    <?php } ?>

</tr>

<?php

$i++;

}

?>

</table>

</body>
</html>