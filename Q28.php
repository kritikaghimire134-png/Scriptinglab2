<?php

if (isset($_POST["upload"])) {

    $file = $_FILES["image"];

    $fileName = $file["name"];
    $fileSize = $file["size"];
    $fileTmp = $file["tmp_name"];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowed = array("png", "jpg", "jpeg");

    if (!in_array($extension, $allowed)) {
        echo "Only PNG and JPEG images are allowed.";
    }
    elseif ($fileSize >= 500 * 1024) {
        echo "File size must be less than 500 KB.";
    }
    else {

        if (!is_dir("profile")) {
            mkdir("profile");
        }

        move_uploaded_file($fileTmp, "profile/" . $fileName);

        echo "Profile image uploaded successfully.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Profile Image</h2>

<form method="post" enctype="multipart/form-data">

    Select Image:
    <input type="file" name="image" required><br><br>

    <input type="submit" name="upload" value="Upload">

</form>

</body>
</html>