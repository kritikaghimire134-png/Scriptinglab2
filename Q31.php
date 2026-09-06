<?php

$conn = mysqli_connect("localhost", "root", "", "college_db");

if (!$conn) {
    die("Database connection failed");
}


/* =========================
   ADD COURSE
========================= */

if (isset($_POST['add_course'])) {

    $title = $_POST['title'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];

    $sql = "INSERT INTO courses
            (title, duration, status)
            VALUES
            ('$title', '$duration', '$status')";

    mysqli_query($conn, $sql);

    echo "Course added successfully.";
}


/* =========================
   DELETE COURSE
========================= */

if (isset($_GET['delete_course'])) {

    $id = $_GET['delete_course'];

    mysqli_query($conn,
        "DELETE FROM courses WHERE id='$id'"
    );

    echo "Course deleted successfully.";
}


/* =========================
   UPDATE COURSE
========================= */

if (isset($_POST['update_course'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];

    $sql = "UPDATE courses SET
            title='$title',
            duration='$duration',
            status='$status',
            updated_at=NOW()
            WHERE id='$id'";

    mysqli_query($conn, $sql);

    echo "Course updated successfully.";
}


/* =========================
   ADD STUDENT
========================= */

if (isset($_POST['add_student'])) {

    $name = $_POST['name'];
    $course_id = $_POST['course_id'];
    $fee = $_POST['fee'];
    $rollno = $_POST['rollno'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];

    $sql = "INSERT INTO students
            (name, course_id, fee, rollno, phone, address, dob, status)
            VALUES
            ('$name', '$course_id', '$fee', '$rollno',
             '$phone', '$address', '$dob', '$status')";

    mysqli_query($conn, $sql);

    echo "Student added successfully.";
}


/* =========================
   DELETE STUDENT
========================= */

if (isset($_GET['delete_student'])) {

    $id = $_GET['delete_student'];

    mysqli_query($conn,
        "DELETE FROM students WHERE id='$id'"
    );

    echo "Student deleted successfully.";
}


/* =========================
   UPDATE STUDENT
========================= */

if (isset($_POST['update_student'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $course_id = $_POST['course_id'];
    $fee = $_POST['fee'];
    $rollno = $_POST['rollno'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];

    $sql = "UPDATE students SET
            name='$name',
            course_id='$course_id',
            fee='$fee',
            rollno='$rollno',
            phone='$phone',
            address='$address',
            dob='$dob',
            status='$status',
            updated_at=NOW()
            WHERE id='$id'";

    mysqli_query($conn, $sql);

    echo "Student updated successfully.";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>College CRUD System</title>
</head>

<body>

<h2>Course Management</h2>

<form method="post">

    Title:
    <input type="text" name="title" required>
    <br><br>

    Duration:
    <input type="text" name="duration" required>
    <br><br>

    Status:
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>

    <br><br>

    <input type="submit"
           name="add_course"
           value="Add Course">

</form>

<br>

<h3>Course List</h3>

<table border="1" cellpadding="8">

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Duration</th>
    <th>Status</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM courses");

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['title']; ?></td>

    <td><?php echo $row['duration']; ?></td>

    <td><?php echo $row['status']; ?></td>

    <td><?php echo $row['created_at']; ?></td>

    <td><?php echo $row['updated_at']; ?></td>

    <td>
        <a href="?delete_course=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>

</tr>

<?php
}
?>

</table>


<hr>


<h2>Student Management</h2>

<form method="post">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Course:

    <select name="course_id" required>

        <option value="">Select Course</option>

        <?php

        $courses = mysqli_query(
            $conn,
            "SELECT * FROM courses"
        );

        while ($course = mysqli_fetch_assoc($courses)) {

        ?>

        <option value="<?php echo $course['id']; ?>">

            <?php echo $course['title']; ?>

        </option>

        <?php
        }
        ?>

    </select>

    <br><br>

    Fee:
    <input type="number" name="fee" required>
    <br><br>

    Roll No:
    <input type="text" name="rollno" required>
    <br><br>

    Phone:
    <input type="text" name="phone" required>
    <br><br>

    Address:
    <input type="text" name="address" required>
    <br><br>

    Date of Birth:
    <input type="date" name="dob" required>
    <br><br>

    Status:

    <select name="status">

        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>

    </select>

    <br><br>

    <input type="submit"
           name="add_student"
           value="Add Student">

</form>


<br>

<h3>Student List</h3>

<table border="1" cellpadding="8">

<tr>

    <th>ID</th>
    <th>Name</th>
    <th>Course</th>
    <th>Fee</th>
    <th>Roll No</th>
    <th>Phone</th>
    <th>Address</th>
    <th>DOB</th>
    <th>Status</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Action</th>

</tr>

<?php

$sql = "SELECT students.*, courses.title AS course_name
        FROM students
        INNER JOIN courses
        ON students.course_id = courses.id";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['course_name']; ?></td>

    <td><?php echo $row['fee']; ?></td>

    <td><?php echo $row['rollno']; ?></td>

    <td><?php echo $row['phone']; ?></td>

    <td><?php echo $row['address']; ?></td>

    <td><?php echo $row['dob']; ?></td>

    <td><?php echo $row['status']; ?></td>

    <td><?php echo $row['created_at']; ?></td>

    <td><?php echo $row['updated_at']; ?></td>

    <td>

        <a href="?delete_student=<?php echo $row['id']; ?>">
            Delete
        </a>

    </td>

</tr>

<?php
}
?>

</table>

</body>
</html>