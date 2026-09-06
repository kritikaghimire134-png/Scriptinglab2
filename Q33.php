<?php
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $subject = "Notification from PHP Script";
    $message = "Hello, this is a test notification sent from your local PHP server script.";
    $headers = "From: webmaster@example.com";

    // Note: Requires a configured mail server/SMTP in php.ini
    if (@mail($to, $subject, $message, $headers)) {
        $msg = "Email sent successfully to $to";
    } else {
        $msg = "Failed to send email. Check local SMTP server configuration.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Send Email Notification</h2>
<p><?php echo $msg; ?></p>
<form method="post">
    Recipient Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Send Email">
</form>
</body>
</html>