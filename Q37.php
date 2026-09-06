<?php

$name = $address = $username = $email = "";
$website = $phone = $gender = $course = "";

$nameErr = $addressErr = $usernameErr = "";
$emailErr = $passwordErr = $websiteErr = "";
$phoneErr = $genderErr = $courseErr = "";

$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $address = trim($_POST["address"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $website = trim($_POST["website"]);
    $phone = trim($_POST["phone"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $course = isset($_POST["course"]) ? $_POST["course"] : "";

    /* NAME VALIDATION */
    if (empty($name)) {
        $nameErr = "Name is required.";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Name must contain only letters and spaces.";
    }


    /* ADDRESS VALIDATION */
    if (empty($address)) {
        $addressErr = "Address is required.";
    }


    /* USERNAME VALIDATION */
    if (empty($username)) {
        $usernameErr = "Username is required.";
    }
    elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $usernameErr =
            "Username can contain only letters, numbers and underscores.";
    }


    /* EMAIL VALIDATION */
    if (empty($email)) {
        $emailErr = "Email is required.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    }


    /* PASSWORD VALIDATION */
    if (empty($password)) {
        $passwordErr = "Password is required.";
    }
    elseif (
        !preg_match(
            "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/",
            $password
        )
    ) {
        $passwordErr =
            "Password must contain at least 8 characters, one uppercase, one lowercase, one digit and one special character.";
    }


    /* WEBSITE VALIDATION */
    if (empty($website)) {
        $websiteErr = "Website is required.";
    }
    elseif (!filter_var($website, FILTER_VALIDATE_URL)) {
        $websiteErr = "Invalid website URL.";
    }


    /* PHONE VALIDATION */
    if (empty($phone)) {
        $phoneErr = "Phone number is required.";
    }
    elseif (!preg_match("/^(96|97|98)[0-9]+$/", $phone)) {
        $phoneErr =
            "Phone must contain only digits and start with 96, 97, or 98.";
    }


    /* GENDER VALIDATION */
    if (empty($gender)) {
        $genderErr = "Please select a gender.";
    }


    /* COURSE VALIDATION */
    $validCourses = ["BCA", "BBS", "BIT", "CSIT"];

    if (empty($course)) {
        $courseErr = "Please select a course.";
    }
    elseif (!in_array($course, $validCourses)) {
        $courseErr = "Please select a valid course.";
    }


    /* FINAL VALIDATION */

    if (
        empty($nameErr) &&
        empty($addressErr) &&
        empty($usernameErr) &&
        empty($emailErr) &&
        empty($passwordErr) &&
        empty($websiteErr) &&
        empty($phoneErr) &&
        empty($genderErr) &&
        empty($courseErr)
    ) {
        $success = "Form submitted successfully!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Form Validation</title>

    <style>

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        input, select {
            margin-bottom: 10px;
        }

    </style>

</head>

<body>

<h2>User Registration Form</h2>

<form method="post"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    Name:
    <input type="text" name="name"
           value="<?php echo htmlspecialchars($name); ?>">

    <span class="error">
        <?php echo $nameErr; ?>
    </span>

    <br><br>


    Address:
    <input type="text" name="address"
           value="<?php echo htmlspecialchars($address); ?>">

    <span class="error">
        <?php echo $addressErr; ?>
    </span>

    <br><br>


    Username:
    <input type="text" name="username"
           value="<?php echo htmlspecialchars($username); ?>">

    <span class="error">
        <?php echo $usernameErr; ?>
    </span>

    <br><br>


    Email:
    <input type="text" name="email"
           value="<?php echo htmlspecialchars($email); ?>">

    <span class="error">
        <?php echo $emailErr; ?>
    </span>

    <br><br>


    Password:
    <input type="password" name="password">

    <span class="error">
        <?php echo $passwordErr; ?>
    </span>

    <br><br>


    Website:
    <input type="text" name="website"
           value="<?php echo htmlspecialchars($website); ?>">

    <span class="error">
        <?php echo $websiteErr; ?>
    </span>

    <br><br>


    Phone:
    <input type="text" name="phone"
           value="<?php echo htmlspecialchars($phone); ?>">

    <span class="error">
        <?php echo $phoneErr; ?>
    </span>

    <br><br>


    Gender:

    <input type="radio"
           name="gender"
           value="Male"
           <?php if ($gender == "Male") echo "checked"; ?>>

    Male

    <input type="radio"
           name="gender"
           value="Female"
           <?php if ($gender == "Female") echo "checked"; ?>>

    Female

    <span class="error">
        <?php echo $genderErr; ?>
    </span>

    <br><br>


    Course:

    <select name="course">

        <option value="">Select Course</option>

        <option value="BCA"
            <?php if ($course == "BCA") echo "selected"; ?>>
            BCA
        </option>

        <option value="BBS"
            <?php if ($course == "BBS") echo "selected"; ?>>
            BBS
        </option>

        <option value="BIT"
            <?php if ($course == "BIT") echo "selected"; ?>>
            BIT
        </option>

        <option value="CSIT"
            <?php if ($course == "CSIT") echo "selected"; ?>>
            CSIT
        </option>

    </select>

    <span class="error">
        <?php echo $courseErr; ?>
    </span>

    <br><br>

    <input type="submit" value="Submit">

</form>


<?php if (!empty($success)) { ?>

    <h3 class="success">
        <?php echo $success; ?>
    </h3>

    <h3>Submitted Data</h3>

    Name: <?php echo htmlspecialchars($name); ?><br>
    Address: <?php echo htmlspecialchars($address); ?><br>
    Username: <?php echo htmlspecialchars($username); ?><br>
    Email: <?php echo htmlspecialchars($email); ?><br>
    Website: <?php echo htmlspecialchars($website); ?><br>
    Phone: <?php echo htmlspecialchars($phone); ?><br>
    Gender: <?php echo htmlspecialchars($gender); ?><br>
    Course: <?php echo htmlspecialchars($course); ?><br>

<?php } ?>

</body>
</html>