<?php

$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn) {
    die("Database connection failed.");
}

/* INSERT */
if (isset($_POST["save"])) {

    $name = $_POST["name"];
    $rank = $_POST["rank"];
    $status = $_POST["status"];

    if (empty($name) || empty($rank) || empty($status)) {
        echo "All fields are required.";
    } else {

        $sql = "INSERT INTO users
                (name, rank, status, created_by)
                VALUES
                ('$name', '$rank', '$status', 'Admin')";

        mysqli_query($conn, $sql);

        echo "Record inserted successfully.";
    }
}

/* DELETE */
if (isset($_GET["delete"])) {

    $id = $_GET["delete"];

    mysqli_query($conn, "DELETE FROM users WHERE id=$id");

    echo "Record deleted successfully.";
}

/* UPDATE */
if (isset($_POST["update"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $rank = $_POST["rank"];
    $status = $_POST["status"];

    $sql = "UPDATE users SET
            name='$name',
            rank='$rank',
            status='$status',
            updated_by='Admin',
            updated_at=NOW()
            WHERE id=$id";

    mysqli_query($conn, $sql);

    echo "Record updated successfully.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD System</title>
</head>

<body>

<h2>Add User</h2>

<form method="post">

    Name:
    <input type="text" name="name" required><br><br>

    Rank:
    <input type="text" name="rank" required><br><br>

    Status:
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>

    <br><br>

    <input type="submit" name="save" value="Save">

</form>

<hr>

<h2>User List</h2>

<table border="1" cellpadding="8">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Rank</th>
    <th>Status</th>
    <th>Created By</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM users");

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["rank"]; ?></td>
<td><?php echo $row["status"]; ?></td>
<td><?php echo $row["created_by"]; ?></td>

<td>

<a href="?delete=<?php echo $row["id"]; ?>"
   onclick="return confirm('Delete this record?')">
   Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>