<?php
session_start();

// Include the database connection file
require_once "database.php";

// Initialize error message variable
$error_message = "";

// Check if the form is submitted for user login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve form data
    $email = $_POST["email_login"];
    $password = $_POST["password_login"];
    $errors = array();

    // Check if email and password are provided
    if (empty($email) || empty($password)) {
        $errors[] = "All fields are required.";
    } else {
        // Check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Email found, now retrieve the hashed password
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct, proceed with login
                $_SESSION["username"] = $row['fname'];
                // Set success message
                $_SESSION["success_message"] = "Login successful!";
                // Redirect to index.php after successful login
                header("Location: contact.php");
                die(); // Make sure to exit after redirection
            } else {
                // Password is incorrect
                $errors[] = "Incorrect password.";
            }
        } else {
            // Email not found
            $errors[] = "Email not found.";
        }
    }
    // Store error message in session variable
    $error_message = implode("<br>", $errors);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maoi Madrid</title>
    <link rel="icon" type="image/x-icon" href="まおまお.png">
    <link rel="stylesheet" href="login_acc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="login">
    <div class="container">
        <form action="login_account.php" method="POST">
            <h1 class="text-center signin">Sign in</h1>
            <div class="mb-3">
                <label for="email_login" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email_login" placeholder="Enter email address">
            </div>
            <div class="mb-3">
                <label for="password_login" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password_login">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn" name="login">Login</button>
            </div>
            <div class="mb-3 text-center">
                <p>Don't have an account yet? <a href="create_acc.php">Register now!</p>
            </div>
        </form>
        <?php
        // Display error message, if any
        if (!empty($error_message)) {
            echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
        }
        ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
