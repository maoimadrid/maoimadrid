<?php
session_start(); // Start or resume the session
require_once "database.php"; // Include database connection file

// Check if the form is submitted for user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $country = $_POST["country_text"];
    $province = $_POST["province_text"];
    $city = $_POST["city_text"];
    $barangay = $_POST["barangay_text"];
    $lot = $_POST["lot"];
    $street = $_POST["street"];
    $phase = $_POST["phase"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
    $errors = array();

    // Validate fields
    if (empty($fname) || empty($lname) || empty($country) || empty($province) || empty($city) || empty($barangay) || empty($lot) || empty($street) || empty($phase) || empty($contact) || empty($email) || empty($password) || empty($confirm)) {
        $errors[] = "All fields are required. If not applicable, type N/A.";
    } else {
        // Validate contact number
        if (strlen($contact) !== 11) {
            $errors[] = "Contact number must be 11 digits.";
            exit();
        }
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
            exit();
        }
        // Validate password
        if (strlen($password) < 8) {
            $errors[] = "Password must be 8 or more characters.";
            exit();
        } elseif ($password !== $confirm) {
            $errors[] = "Passwords do not match.";
            exit();
        }
    }
    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        // Prepare SQL statement to insert data into the database
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, country, province, city, barangay, lot, street, phase, contact, email, password) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $fname, $lname, $country, $province, $city, $barangay, $lot, $street, $phase, $contact, $email, $hashed);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Registration successful
            $_SESSION["username"] = $fname;
            echo '<div class="alert alert-success" role="alert">Registration successful!</div>';
            header("refresh:0;url=login_account.php");
        } else {
            // Error in registration
            echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maoi Madrid</title>
    <link rel="icon" type="image/x-icon" href="まおまお.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="create_acc.css">
</head>
<body>
    <div class="container">
        <form method="POST">
            <h1 class="text-center account">Create Account</h1>
            <div class="row g-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" required>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <label for="">Address</label>
                <div class="col">
                    <div class="mb-3">
                        <select name="country" class="form-select" id="country" required>
                            <option value="" disabled selected>Choose Country</option>
                        </select>
                        <input type="hidden" class="form-control" name="country_text" id="country-text" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select class="form-select" name="province" id="province" required>
                            <option value="" disabled selected>Choose State/Province</option>
                        </select>
                        <input type="hidden" class="form-control" name="province_text" id="province-text">
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="mb-3">
                        <select name="city" class="form-select" id="city" required>
                            <option value="" disabled selected>Choose City/Municipality</option>
                        </select>
                        <input type="hidden" class="form-control" name="city_text" id="city-text">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select name="barangay" class="form-select" id="barangay" required>
                            <option value="" disabled selected>Choose Barangay</option>
                        </select>
                        <input type="hidden" class="form-control" name="barangay_text" id="barangay-text">
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="lot" name="lot" placeholder="Blk/Lot">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="phase" name="phase" placeholder="Phase/Subdivision">
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <label for="contact" class="form-label">Contact No.</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+63</span>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control" id="confirm" name="confirm" required>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn" name="register">Register</button>
            </div>
            <div class="mb-3 text-center">
                <p>Already have an account? <a href="login_account.php">Log in now!</a></p>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="address.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // Form submission handler
        $("#registration-form").submit(function(event) {
            event.preventDefault();
            // Clear previous error messages
            $("#error-messages").empty();

            // Serialize the form data
            var formData = $(this).serialize();

            // Send the form data to the server using AJAX
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function(response) {
                    // Check if response contains any errors
                    if (response && response.errors) {
                        // Display error messages
                        var errorMessages = response.errors.join("<br>");
                        $("#error-messages").html("<div class='alert alert-danger'>" + errorMessages + "</div>");
                    } else {
                        // Redirect to some_page.php upon successful registration
                        alert("Registration successful! You may now submit your message.");
                        window.location.href = "some_page.php";
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle AJAX errors here
                }
            });
        });
    </script>
</body>
</html>