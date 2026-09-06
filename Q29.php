<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];

    if (strlen($username) < 8) {
        $message = "Username must contain at least 8 characters.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
    }
    elseif (!strtotime($dob)) {
        $message = "Invalid date of birth.";
    }
    elseif (strlen($phone) != 10 || !is_numeric($phone)) {
        $message = "Phone number must contain 10 digits.";
    }
    else {
        $message = "Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="post">

    Username:
    <input type="text" name="username"><br><br>

    Email:
    <input type="text" name="email"><br><br>

    Date of Birth:
    <input type="date" name="dob"><br><br>

    Phone:
    <input type="text" name="phone"><br><br>

    <input type="submit" value="Register">

</form>

<p><?php echo $message; ?></p>

</body>
</html>