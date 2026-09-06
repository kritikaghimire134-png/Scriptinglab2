<?php

$message = "";

if (isset($_POST['operation'])) {

    $filename = $_POST['filename'];
    $operation = $_POST['operation'];

    /* CHECK FILE */
    if ($operation == "check") {

        if (file_exists($filename)) {
            $message = "File exists.";
        } else {
            $message = "File does not exist.";
        }
    }


    /* OPEN FILE */
    elseif ($operation == "open") {

        $file = fopen($filename, "r");

        if ($file) {
            $message = "File opened successfully.";
            fclose($file);
        } else {
            $message = "Unable to open file.";
        }
    }


    /* WRITE FILE */
    elseif ($operation == "write") {

        $text = $_POST['text'];

        $file = fopen($filename, "w");

        fwrite($file, $text);

        fclose($file);

        $message = "Data written successfully.";
    }


    /* READ FILE */
    elseif ($operation == "read") {

        if (file_exists($filename)) {

            $file = fopen($filename, "r");

            $message = fread($file, filesize($filename));

            fclose($file);

        } else {

            $message = "File does not exist.";
        }
    }


    /* CLOSE FILE */
    elseif ($operation == "close") {

        $file = fopen($filename, "r");

        if ($file) {
            fclose($file);
            $message = "File opened and closed successfully.";
        } else {
            $message = "Unable to open file.";
        }
    }


    /* RENAME FILE */
    elseif ($operation == "rename") {

        $newname = $_POST['newname'];

        if (file_exists($filename)) {

            if (rename($filename, $newname)) {
                $message = "File renamed successfully.";
            } else {
                $message = "Unable to rename file.";
            }

        } else {
            $message = "File does not exist.";
        }
    }


    /* CHECK PERMISSION */
    elseif ($operation == "permission") {

        if (file_exists($filename)) {

            $permission = substr(
                sprintf("%o", fileperms($filename)),
                -4
            );

            $message = "File permission: " . $permission;

        } else {
            $message = "File does not exist.";
        }
    }


    /* CHANGE PERMISSION */
    elseif ($operation == "change_permission") {

        if (file_exists($filename)) {

            chmod($filename, 0644);

            $permission = substr(
                sprintf("%o", fileperms($filename)),
                -4
            );

            $message = "Permission changed successfully.<br>";
            $message .= "Updated permission: " . $permission;

        } else {
            $message = "File does not exist.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Handling</title>
</head>

<body>

<h2>File Handling Operations</h2>

<form method="post">

    Filename:
    <input type="text" name="filename" required>

    <br><br>

    Text to Write:
    <br>

    <textarea name="text" rows="4" cols="40"></textarea>

    <br><br>

    New Filename:
    <input type="text" name="newname">

    <br><br>

    <select name="operation">

        <option value="check">Check File</option>
        <option value="open">Open File</option>
        <option value="write">Write File</option>
        <option value="read">Read File</option>
        <option value="close">Close File</option>
        <option value="rename">Rename File</option>
        <option value="permission">Check Permissions</option>
        <option value="change_permission">Change Permissions</option>

    </select>

    <br><br>

    <input type="submit"
           value="Perform Operation">

</form>

<hr>

<h3>Result</h3>

<p><?php echo $message; ?></p>

</body>
</html>