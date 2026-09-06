<?php

$info = [
    'name' => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email' => 'info@ram.com',
    'phone' => '98454545',
    'website' => 'www.ram.com'
];

?>

<!DOCTYPE html>
<html>
<head>

    <title>Information Table</title>

    <style>
        table {
            border-collapse: collapse;
            width: 500px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            width: 150px;
        }
    </style>

</head>

<body>

<table>

    <tr>
        <th>Name</th>
        <td><?php echo $info['name']; ?></td>
    </tr>

    <tr>
        <th>Address</th>
        <td><?php echo $info['address']; ?></td>
    </tr>

    <tr>
        <th>Email</th>
        <td>
            <a href="mailto:<?php echo $info['email']; ?>">
                <?php echo $info['email']; ?>
            </a>
        </td>
    </tr>

    <tr>
        <th>Phone</th>
        <td><?php echo $info['phone']; ?></td>
    </tr>

    <tr>
        <th>Website</th>
        <td><?php echo $info['website']; ?></td>
    </tr>

</table>

</body>
</html>