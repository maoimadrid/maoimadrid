<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "maomao");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sample data
$fname = "John";
$lname = "Doe";
$country = "Philippines";
$province = "Metro Manila";
$city = "Makati";
$barangay = "Barangay 123";
$lot = "Lot 5";
$street = "Main Street";
$phase = "Phase 1";
$contact = "09123456789";
$email = "john.doe@example.com";
$password = "password123";

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement
$sql = "INSERT INTO users (fname, lname, country, province, city, barangay, lot, street, phase, contact, email, password) 
        VALUES ('$fname', '$lname', '$country', '$province', '$city', '$barangay', '$lot', '$street', '$phase', '$contact', '$email', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>
