<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "12345") {

        // Create session
        $_SESSION["username"] = $username;

        // Create cookie for 1 hour
        setcookie("username", $username, time() + 3600);

        $message = "Login Successful!";
    } else {
        $message = "Invalid Username or Password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session and Cookie Login</title>
</head>
<body>

<h2>Login Form</h2>

<form method="post">
    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" value="Login">
</form>

<p><?php echo $message; ?></p>

<?php
if (isset($_SESSION["username"])) {
    echo "Session Username: " . $_SESSION["username"] . "<br>";
}

if (isset($_COOKIE["username"])) {
    echo "Cookie Username: " . $_COOKIE["username"];
}
?>

</body>
</html>